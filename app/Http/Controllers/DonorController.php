<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\FoodDonation;
use App\Models\DonationRequest;

class DonorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $totalDonations = FoodDonation::where(
            'donor_id',
            $user->id
        )->count();

        $completedDonations = FoodDonation::where(
            'donor_id',
            $user->id
        )
        ->where('status','completed')
        ->count();

        $pendingRequests = DonationRequest::whereHas(
            'donation',
            function($q) use ($user){
                $q->where('donor_id',$user->id);
            }
        )
        ->where('status','pending')
        ->count();

        $recentDonations = FoodDonation::where(
            'donor_id',
            $user->id
        )
        ->latest()
        ->take(5)
        ->get();

        return view(
            'donor.dashboard',
            compact(
                'user',
                'totalDonations',
                'completedDonations',
                'pendingRequests',
                'recentDonations'
            )
        );
    }

    public function createDonation()
    {
        $categories = Category::all();

        return view(
            'donor.create-donation',
            compact('categories')
        );
    }

public function storeDonation(Request $request)
{
    $request->validate([

        'title' => 'required',

        'category_id' => 'required',

        'quantity' => 'required|integer|min:1',

        'expired_at' => 'required',

        'pickup_address' => 'required',

        'description' => 'nullable',

        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

    ]);

    $photoPath = null;

    if($request->hasFile('photo'))
    {
        $photoPath = $request
            ->file('photo')
            ->store(
                'donations',
                'public'
            );
    }

    FoodDonation::create([

        'id' => (string) \Illuminate\Support\Str::uuid(),

        'donor_id' => Auth::id(),

        'category_id' => $request->category_id,

        'title' => $request->title,

        'description' => $request->description,

        'quantity' => $request->quantity,

        'unit' => $request->unit,

        'status' => 'available',

        'photo_url' => $photoPath,

        'expired_at' => $request->expired_at,

        'pickup_address' => $request->pickup_address

    ]);

    return redirect('/donor/my-donations')
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
    )
    ->latest()
    ->paginate(10);

    return view(
        'donor.my-donations',
        compact('donations')
    );
}

public function myDonationDetail($id)
{
    $donation = FoodDonation::findOrFail($id);

    return view(
        'donor.my-donation-detail',
        compact('donation')
    );
}

public function editDonation($id)
{
$donation = FoodDonation::findOrFail($id);

$categories = Category::all();

return view(
    'donor.edit-donation',
    compact(
        'donation',
        'categories'
    )
);

}

public function updateDonation(
Request $request,
$id
)
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

$request->validate([

    'title' => 'required',

    'category_id' => 'required',

    'quantity' => 'required|integer|min:1',

    'expired_at' => 'required',

    'pickup_address' => 'required'

]);

if($request->hasFile('photo'))
{
    if(
        $donation->photo_url &&
        Storage::disk('public')
            ->exists($donation->photo_url)
    ){
        Storage::disk('public')
            ->delete($donation->photo_url);
    }

    $donation->photo_url =
        $request
        ->file('photo')
        ->store(
            'donations',
            'public'
        );
}

$donation->update([

    'title' => $request->title,

    'category_id' => $request->category_id,

    'quantity' => $request->quantity,

    'unit' => $request->unit,

    'description' => $request->description,

    'expired_at' => $request->expired_at,

    'pickup_address' => $request->pickup_address

]);

return redirect(
    '/donor/my-donations/'.$donation->id
)->with(
    'success',
    'Donasi berhasil diperbarui'
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

    return back()->with(
        'success',
        'Donasi berhasil dibatalkan'
    );
}

public function requests()
{
    $donations = FoodDonation::where(
        'donor_id',
        Auth::id()
    )
    ->latest()
    ->get();

    return view(
        'donor.donor-requests',
        compact('donations')
    );
}

    public function profile()
    {
        $user = Auth::user();

        return view(
            'donor.profile',
            compact('user')
        );
    }

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;

    if($request->hasFile('profile_photo'))
    {
        if(
            $user->profile_photo &&
            Storage::disk('public')->exists($user->profile_photo)
        ){
            Storage::disk('public')
                ->delete($user->profile_photo);
        }

        $user->profile_photo =
            $request
            ->file('profile_photo')
            ->store('profiles','public');
    }

    $user->save();

    return back()->with(
        'success',
        'Profil berhasil diperbarui'
    );
}
}