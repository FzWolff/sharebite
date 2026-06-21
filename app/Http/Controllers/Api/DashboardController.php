<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodDonation;
use App\Models\DonationRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'total_donations' => FoodDonation::count(),

            'available_donations' => FoodDonation::where(
                'status',
                'available'
            )->count(),

            'partially_taken_donations' => FoodDonation::where(
                'status',
                'partially_taken'
            )->count(),

            'completed_donations' => FoodDonation::where(
                'status',
                'completed'
            )->count(),

            'total_requests' => DonationRequest::count(),

            'pending_requests' => DonationRequest::where(
                'status',
                'pending'
            )->count(),

            'approved_requests' => DonationRequest::where(
                'status',
                'approved'
            )->count(),

            'rejected_requests' => DonationRequest::where(
                'status',
                'rejected'
            )->count(),
        ]);
    }

    public function recentDonations()
    {
    return FoodDonation::latest()
        ->take(5)
        ->get();
    }

    public function recentRequests()
    {
    return DonationRequest::latest()
        ->take(5)
        ->get();
    }
}