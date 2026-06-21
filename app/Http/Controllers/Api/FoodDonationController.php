<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodDonation;
use Illuminate\Http\Request;

class FoodDonationController extends Controller
{
    public function index()
    {
        return FoodDonation::with('category')
    ->whereIn('status',['available','partially_taken'])
    ->get();
    }

    public function show($id)
    {
    return FoodDonation::with('category')
        ->findOrFail($id);
    }

    public function store(Request $request)
    {

    $request->validate([
    'donor_id' => 'required|exists:users,id',
    'category_id' => 'required|exists:categories,id',
    'title' => 'required|max:255',
    'quantity' => 'required|integer|min:1',
    'unit' => 'required|max:50',
    'pickup_address' => 'required',
    'expired_at' => 'required|date|after:now',
    ]);

    $donation = FoodDonation::create([
    'id' => \Illuminate\Support\Str::uuid()->toString(),
    'donor_id' => $request->donor_id,
    'category_id' => $request->category_id,
    'title' => $request->title,
    'description' => $request->description,
    'quantity' => $request->quantity,
    'unit' => $request->unit,
    'status' => 'available',
    'pickup_address' => $request->pickup_address,
    'expired_at' => $request->expired_at,
    ]);

    return response()->json([
    'success' => true,
    'message' => 'Donasi berhasil dibuat',
    'data' => $donation
    ], 201);
    }

    public function myDonations($userId)
    {
    return FoodDonation::with('category')
        ->where('donor_id', $userId)
        ->get();
    }
}