<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\FoodDonation;
use App\Models\DonationRequest;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [

            'total_donations' =>
                FoodDonation::count(),

            'available_donations' =>
                FoodDonation::where(
                    'status',
                    'available'
                )->count(),

            'total_requests' =>
                DonationRequest::count(),

            'pending_requests' =>
                DonationRequest::where(
                    'status',
                    'pending'
                )->count(),

            'total_recipients' =>
                User::where(
                    'role',
                    'recipient'
                )->count(),

            'total_donors' =>
                User::where(
                    'role',
                    'donor'
                )->count(),
        ];

        $latestRequests =
            DonationRequest::with(
                'recipient',
                'donation'
            )
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'stats',
                'latestRequests'
            )
        );
    }

    public function donations()
{
    $donations = FoodDonation::with('donor')
        ->latest()
        ->paginate(10);

    return view(
        'admin.donations',
        compact('donations')
    );
}

public function editDonation($id)
{
    $donation = FoodDonation::findOrFail($id);

    return view(
        'admin.edit-donation',
        compact('donation')
    );
}

public function updateDonation(
    Request $request,
    $id
)
{
    $donation = FoodDonation::findOrFail($id);

    $donation->update([

        'title' => $request->title,

        'description' => $request->description,

        'quantity' => $request->quantity,

        'pickup_address' => $request->pickup_address

    ]);

    return redirect(
        '/admin/donations'
    )->with(
        'success',
        'Donasi berhasil diperbarui'
    );
}

public function deleteDonation($id)
{
    $donation = FoodDonation::findOrFail($id);

    $donation->update([
        'status' => 'cancelled'
    ]);

    return back()->with(
        'success',
        'Donasi berhasil dibatalkan'
    );
}

public function requests()
{
    $requests = DonationRequest::with(
        'recipient',
        'donation'
    )
    ->latest()
    ->paginate(10);

    return view(
        'admin.requests',
        compact('requests')
    );
}

public function approveRequest($id)
{
    $request = DonationRequest::findOrFail($id);

    $request->update([
        'status' => 'approved'
    ]);

    return back()->with(
        'success',
        'Pengajuan berhasil disetujui'
    );
}

public function rejectRequest($id)
{
    $request = DonationRequest::findOrFail($id);

    $request->update([
        'status' => 'rejected'
    ]);

    return back()->with(
        'success',
        'Pengajuan berhasil ditolak'
    );
}

public function users()
{
    $adminCount = User::where('role','admin')->count();
    $donorCount = User::where('role','donor')->count();
    $recipientCount = User::where('role','recipient')->count();
    $users = User::latest()
        ->paginate(10);

    return view(
        'admin.users',
        compact(
        'users',
        'adminCount',
        'donorCount',
        'recipientCount'
        )
    );
}

public function editUser($id)
{
    $user = User::findOrFail($id);

    return view(
        'admin.user-edit',
        compact('user')
    );
}

public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'phone' => $request->phone,
    ]);

    return redirect('/admin/users')
        ->with(
            'success',
            'User berhasil diperbarui'
        );
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return back()->with(
        'success',
        'User berhasil dihapus'
    );
}

public function reports()
{
    $totalUsers = User::count();

    $totalDonations = FoodDonation::count();

    $totalRequests = DonationRequest::count();

    $completedRequests =
        DonationRequest::where(
            'status',
            'completed'
        )->count();

    return view(
        'admin.reports',
        compact(
            'totalUsers',
            'totalDonations',
            'totalRequests',
            'completedRequests'
        )
    );
}

public function profile()
{
    $user = auth()->user();

    return view(
        'admin.profile',
        compact('user')
    );
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;

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