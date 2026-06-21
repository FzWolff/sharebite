<?php

namespace App\Http\Controllers;

use App\Models\FoodDonation;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Review;

class TestFrontendController extends Controller
{
    public function dashboard()
    {
        $dashboard = [
            'total_donations' => FoodDonation::count(),
            'available_donations' => FoodDonation::where('status','available')->count(),
            'total_requests' => DonationRequest::count(),
            'pending_requests' => DonationRequest::where('status','pending')->count(),
        ];

        return view('test.dashboard', compact('dashboard'));
    }

    public function donations()
    {
        $donations = FoodDonation::with('category')
            ->where('status','available')
            ->get()
            ->toArray();

        return view('test.donations', compact('donations'));
    }

    public function detail($id)
    {
        $donation = FoodDonation::with('category')
            ->findOrFail($id)
            ->toArray();

        return view('test.detail', compact('donation'));
    }

    public function loginForm()
    {
    return view('test.login');
    }

    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {

        return back()->with(
            'error',
            'Email atau password salah'
        );
    }

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/test/admin-dashboard');
    }

    if ($user->role === 'donor') {
        return redirect('/test/donor-dashboard');
    }

    if ($user->role === 'recipient') {
        return redirect('/test/recipient-dashboard');
    }

    return back()->with(
        'error',
        'Role tidak dikenali'
    );
    }

    public function registerForm()
    {
    return view('test.register');
    }

    public function register(Request $request)
{
$request->validate([

    'name' => 'required',

    'email' =>
        'required|email|unique:users,email',

    'password' =>
        'required|min:8',

    'role' =>
        'required|in:donor,recipient',

    'organization_name' =>
        'required_if:role,recipient',

    'organization_email' =>
        'required_if:role,recipient|email',

    'organization_phone' =>
        'required_if:role,recipient',

    'organization_address' =>
        'required_if:role,recipient',

]);

User::create([

    'id' => Str::uuid()->toString(),

    'name' => $request->name,

    'email' => $request->email,

    'password' => Hash::make(
        $request->password
    ),

    'role' => $request->role,

    'organization_name' =>
        $request->organization_name,

    'organization_email' =>
        $request->organization_email,

    'organization_phone' =>
        $request->organization_phone,

    'organization_address' =>
        $request->organization_address,

    'is_active' => 1

]);

return redirect('/test/login')
    ->with(
        'success',
        'Register berhasil, silakan login'
    );
}


    public function donorDashboard()
    {
    $user = Auth::user();

    $totalDonations = FoodDonation::where(
        'donor_id',
        $user->id
    )->count();

    return view(
        'test.donor-dashboard',
        compact(
            'user',
            'totalDonations'
        )
    );
    }

    public function recipientDashboard()
    {
    $user = Auth::user();

    $totalRequests = DonationRequest::where(
        'recipient_id',
        $user->id
    )->count();

    $pendingRequests = DonationRequest::where(
        'recipient_id',
        $user->id
    )->where(
        'status',
        'pending'
    )->count();

    return view(
        'test.recipient-dashboard',
        compact(
            'user',
            'totalRequests',
            'pendingRequests'
        )
    );
    }

    public function adminDashboard()
    {
    $user = Auth::user();

    $stats = [
        'total_donations' => FoodDonation::count(),
        'available_donations' => FoodDonation::where('status','available')->count(),
        'partially_taken_donations' => FoodDonation::where('status','partially_taken')->count(),
        'completed_donations' => FoodDonation::where('status','completed')->count(),
        'cancelled_donations' => FoodDonation::where('status','cancelled')->count(),

        'total_requests' => DonationRequest::count(),
        'pending_requests' => DonationRequest::where('status','pending')->count(),
        'approved_requests' => DonationRequest::where('status','approved')->count(),
        'rejected_requests' => DonationRequest::where('status','rejected')->count(),
        'cancelled_requests' => DonationRequest::where('status','cancelled')->count(),
    ];

    return view(
        'test.admin-dashboard',
        compact('user', 'stats')
    );
    }

    public function createDonationForm()
    {
    $categories = Category::all();

    return view(
        'test.create-donation',
        compact('categories')
    );
    }

    public function storeDonation(Request $request)
    {
    $request->validate([
        'category_id' => 'required',
        'title' => 'required',
        'quantity' => 'required|integer|min:1',
        'unit' => 'required',
        'pickup_address' => 'required',
        'expired_at' => 'required|date',
    ]);

    FoodDonation::create([
        'id' => Str::uuid()->toString(),
        'donor_id' => Auth::id(),
        'category_id' => $request->category_id,
        'title' => $request->title,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'unit' => $request->unit,
        'status' => 'available',
        'pickup_address' => $request->pickup_address,
        'expired_at' => $request->expired_at,
    ]);

    return redirect('/donor/donations')
    ->with(
        'success',
        'Donasi berhasil ditambahkan'
    );
    }

    public function myDonations()
    {
    $donations = FoodDonation::where(
        'donor_id',
        Auth::id()
    )->get();

    return view(
        'test.my-donations',
        compact('donations')
    );
    }

    public function logout()
    {
    Auth::logout();

    return redirect('/test/login');
    }

    public function donorRequests()
    {
    $donorId = auth()->id();

    $requests = DonationRequest::with(
        'donation',
        'recipient'
    )
    ->whereHas('donation', function ($query) use ($donorId) {
        $query->where('donor_id', $donorId);
    })
    ->orderBy('created_at', 'desc')
    ->get();

    foreach ($requests as $request) {

    $request->rating = Review::where(
        'reviewee_id',
        $request->recipient_id
    )->avg('rating');

    $request->review_count = Review::where(
        'reviewee_id',
        $request->recipient_id
    )->count();
    }

    return view(
        'test.donor-requests',
        compact('requests')
    );
    }

    public function approveRequest($id)
    {
    $requestData = DonationRequest::findOrFail($id);

    if ($requestData->status !== 'pending') {
        return back();
    }

    $donation = FoodDonation::findOrFail(
        $requestData->donation_id
    );

    if ($donation->donor_id !== Auth::id()) {
    abort(403);
    }   

    if (
        $requestData->quantity_requested >
        $donation->quantity
    ) {
        return back()->with(
            'error',
            'Stok tidak cukup'
        );
    }

    $donation->quantity -=
        $requestData->quantity_requested;

    if ($donation->quantity <= 0) {

        $donation->quantity = 0;

        $donation->status = 'completed';

    } else {

        $donation->status = 'partially_taken';

    }

    $donation->save();

    $requestData->status = 'approved';
    $requestData->save();

    return redirect('/test/donor-requests');
    }

    public function rejectRequest($id)
    {
    $requestData = DonationRequest::findOrFail($id);

    if ($requestData->status !== 'pending') {
        return back();
    }

    $donation = FoodDonation::findOrFail(
        $requestData->donation_id
    );

    if ($donation->donor_id !== Auth::id()) {
        abort(403, 'Akses ditolak');
    }

    $requestData->status = 'rejected';
    $requestData->save();

    return redirect('/test/donor-requests');
    }

    public function myDonationDetail($id)
    {
    $donation = FoodDonation::where(
    'id',
    $id
    )
    ->where(
        'donor_id',
        Auth::id()
    )
    ->firstOrFail();

    return view(
        'test.my-donation-detail',
        compact('donation')
    );
    }

    public function editDonationForm($id)
    {
    $donation = FoodDonation::where('id',$id)
    ->where('donor_id',Auth::id())
    ->firstOrFail();

    return view(
        'test.edit-donation',
        compact('donation')
    );
    }

    public function updateDonation(Request $request,$id)
    {
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'quantity' => 'required|integer|min:1',
        'pickup_address' => 'required'
    ]);

    $donation = FoodDonation::where('id',$id)
    ->where('donor_id',Auth::id())
    ->firstOrFail();

    if (
    in_array(
        $donation->status,
        [
            'completed',
            'cancelled'
        ]
    )
    ) {
    return back()->with(
        'error',
        'Donasi tidak bisa diedit'
    );
    }

    $donation->update([
        'title' => $request->title,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'pickup_address' => $request->pickup_address,
    ]);

    return redirect(
        "/test/my-donations/$id"
    );
    }

    public function cancelDonation($id)
    {
    $donation = FoodDonation::where('id',$id)
    ->where('donor_id',Auth::id())
    ->firstOrFail();

    if ($donation->status !== 'available') {
    return back()->with(
        'error',
        'Donasi tidak dapat dibatalkan'
    );
    }

    $donation->status = 'cancelled';

    $donation->save();

    return redirect(
        '/test/my-donations'
    );
    }

   public function recipientDonations()
{
    $donations = FoodDonation::with('category')
        ->whereIn(
            'status',
            [
                'available',
                'partially_taken'
            ]
        )
        ->get();

    return view(
        'test.recipient-donations',
        compact('donations')
    );
}

    public function recipientDonationDetail($id)
    {
    $donation = FoodDonation::whereIn(
    'status',
    [
        'available',
        'partially_taken'
    ]
)->findOrFail($id);
    $rating = Review::where(
    'reviewee_id',
    $donation->donor_id
    )->avg('rating');

    $totalReviews = Review::where(
    'reviewee_id',
    $donation->donor_id
    )->count();
    return view(
    'test.recipient-donation-detail',
    compact('donation','rating','totalReviews'));
    }

    public function submitRequest(Request $request,$id)
    {
        $request->validate([
        'quantity_requested' =>
        'required|integer|min:1',
        ]);

        $donation = FoodDonation::findOrFail($id);
        if (
        $request->quantity_requested >
        $donation->quantity
        ) {
        return back()->with(
            'error',
            'Jumlah melebihi stok tersedia'
        );
        }

        if (
        !in_array(
            $donation->status,
            [
                'available',
                'partially_taken'
            ]
        )
        ) {
        return back()->with(
            'error',
            'Donasi tidak tersedia'
        );
        }

    DonationRequest::create([
        'id' => Str::uuid()->toString(),
        'recipient_id' => Auth::id(),
        'donation_id' => $id,
        'message' => $request->message,
        'quantity_requested' => $request->quantity_requested,
        'status' => 'pending',
        'pickup_time' => $request->pickup_time,
    ]);

    return redirect(
        '/test/my-requests'
    );
    }

    public function myRequests()
    {
    $requests = DonationRequest::with('donation')
        ->where(
            'recipient_id',
            Auth::id()
        )
        ->latest()
        ->get();

    return view(
        'test.my-requests',
        compact('requests')
    );
    }

    public function requestDetail($id)
    {
    $requestData = DonationRequest::with('donation')
    ->where('id', $id)
    ->where('recipient_id', Auth::id())
    ->firstOrFail();

    return view(
        'test.request-detail',
        compact('requestData')
    );
    }

    public function cancelRequest($id)
    {
    $requestData = DonationRequest::with('donation')
    ->where('id', $id)
    ->where('recipient_id', Auth::id())
    ->firstOrFail();

    if ($requestData->status !== 'pending') {

        return back()->with(
            'error',
            'Request tidak dapat dibatalkan'
        );
    }

    $requestData->status = 'cancelled';

    $requestData->save();

    return redirect('/test/my-requests');
    }

    public function filterRequests($status)
    {
    $requests = DonationRequest::with('donation')
        ->where(
            'recipient_id',
            Auth::id()
        )
        ->where(
            'status',
            $status
        )
        ->latest()
        ->get();

    return view(
        'test.my-requests',
        compact('requests')
    );
    }

    public function adminDonations()
    {
    $donations = FoodDonation::latest()->get();

    return view(
        'test.admin-donations',
        compact('donations')
    );
    }

    public function adminRequests()
    {
    $requests = DonationRequest::with('donation')
        ->latest()
        ->get();

    return view(
        'test.admin-requests',
        compact('requests')
    );
    }

    public function adminUsers()
    {
    $users = User::latest()->get();

    foreach ($users as $user) {

        $user->rating = Review::where(
            'reviewee_id',
            $user->id
        )->avg('rating');

        $user->review_count = Review::where(
            'reviewee_id',
            $user->id
        )->count();
    }

    return view(
        'test.admin-users',
        compact('users')
    );
    }
}
