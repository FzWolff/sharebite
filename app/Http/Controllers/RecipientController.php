<?php

namespace App\Http\Controllers;

use App\Models\FoodDonation;
use App\Models\DonationRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function donations()
    {
        $donations = FoodDonation::with('category')
            ->whereIn('status', [
                'available',
                'partially_taken'
            ])
            ->latest()
            ->get();

        return view(
            'recipient.donations',
            compact('donations')
        );
    }

        public function detail($id)
    {
        $donation = FoodDonation::with('category')
            ->findOrFail($id);

        return view(
            'recipient.donation-detail',
            compact('donation')
        );
    }

    public function submitRequest(
Request $request,
$id
)
{
$request->validate([
'quantity_requested' =>
'required|integer|min:1',
    'pickup_time' =>
        'required'
]);

$donation =
    FoodDonation::findOrFail($id);

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

    'id' => Str::uuid(),

    'recipient_id' => auth()->id(),

    'donation_id' => $id,

    'message' => $request->message,

    'quantity_requested'
        => $request->quantity_requested,

    'status' => 'pending',

    'pickup_time'
        => $request->pickup_time,

]);

return redirect('/recipient/history')
    ->with(
        'success',
        'Pengajuan berhasil dikirim'
    );

}


    public function history()
    {
        $requests = DonationRequest::with('donation')
            ->where(
                'recipient_id',
                auth()->id()
            )
            ->latest()
            ->paginate(5);

        return view(
            'recipient.history',
            compact('requests')
        );
    }

    public function historyDetail($id)
    {
        $request = DonationRequest::with([
            'donation',
            'recipient'
        ])->findOrFail($id);

        return view(
            'recipient.history-detail',
            compact('request')
        );
    }

    public function status()
    {
        $requests = DonationRequest::with('donation')
            ->where('recipient_id', auth()->id())
            ->latest()
            ->paginate(5);

        return view(
            'recipient.status',
            compact('requests')
        );
    }

    public function dashboard()
{
    $user = auth()->user();

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

    $approvedRequests = DonationRequest::where(
        'recipient_id',
        $user->id
    )->where(
        'status',
        'approved'
    )->count();

    $completedRequests = DonationRequest::where(
        'recipient_id',
        $user->id
    )->where(
        'status',
        'completed'
    )->count();

    $latestRequest = DonationRequest::with('donation')
        ->where(
            'recipient_id',
            $user->id
        )
        ->latest()
        ->first();

    return view(
        'recipient.dashboard',
        compact(
            'user',
            'totalRequests',
            'pendingRequests',
            'approvedRequests',
            'completedRequests',
            'latestRequest'
        )
    );
}

    public function profile()
    {
        $user = auth()->user();

        return view(
            'recipient.profile',
            compact('user')
        );
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'organization_name' => 'required',
            'organization_email' => 'required|email',
            'organization_phone' => 'required',
            'organization_address' => 'required',
        ]);

        $user->organization_name = $request->organization_name;
        $user->organization_email = $request->organization_email;
        $user->organization_phone = $request->organization_phone;
        $user->organization_address = $request->organization_address;

        if ($request->hasFile('profile_photo')) {

            $path = $request->file('profile_photo')
                            ->store('profiles', 'public');

            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }
    
}