<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FoodDonation;

class DonationRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'recipient_id' => 'required',
        'donation_id' => 'required',
        'quantity_requested' => 'required|integer|min:1',
        ]);

        $donation = FoodDonation::findOrFail($request->donation_id);
        if ($request->quantity_requested > $donation->quantity) {
        return response()->json([
            'message' => 'Jumlah request melebihi stok yang tersedia'
        ], 400);
        }
        $donationRequest = DonationRequest::create([
            'id' => Str::uuid()->toString(),
            'recipient_id' => $request->recipient_id,
            'donation_id' => $request->donation_id,
            'message' => $request->message,
            'quantity_requested' => $request->quantity_requested,
            'status' => 'pending',
            'pickup_time' => $request->pickup_time
        ]);

        return response()->json([
            'message' => 'Request donasi berhasil dibuat',
            'data' => $donationRequest
        ], 201);
    }

    public function myRequests($recipientId)
    {
    return DonationRequest::where('recipient_id', $recipientId)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function approve($id)
    {
    $request = DonationRequest::findOrFail($id);
    if ($request->status !== 'pending') {
    return response()->json([
        'message' => 'Request sudah diproses sebelumnya'
    ], 400);
    }
    $donation = FoodDonation::findOrFail($request->donation_id);

    if ($request->quantity_requested > $donation->quantity) {
        return response()->json([
            'message' => 'Jumlah request melebihi stok donasi'
        ], 400);
    }

    $donation->quantity -= $request->quantity_requested;

    if ($donation->quantity == 0) {
        $donation->status = 'completed';
    } else {
        $donation->status = 'partially_taken';
    }

    $donation->save();

    $request->status = 'approved';
    $request->save();

    return response()->json([
        'message' => 'Request berhasil di-approve',
        'request' => $request,
        'donation' => $donation
    ]);
    }

    public function reject($id)
    {
        $request = DonationRequest::findOrFail($id);
        if ($request->status !== 'pending') {
        return response()->json([
        'message' => 'Request sudah diproses sebelumnya'
        ], 400);
}
        $request->status = 'rejected';
        $request->save();

        return response()->json([
            'message' => 'Request berhasil di-reject',
            'data' => $request
        ]);
    }
}