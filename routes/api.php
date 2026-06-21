<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FoodDonationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/donations', [FoodDonationController::class, 'index']);
Route::get('/donations/{id}', [FoodDonationController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/donations', [FoodDonationController::class, 'store']);
Route::post('/donation-requests', [DonationRequestController::class, 'store']);
Route::get('/my-donations/{userId}', [FoodDonationController::class, 'myDonations']);
Route::get('/my-requests/{recipientId}', [DonationRequestController::class, 'myRequests']);
Route::patch('/donation-requests/{id}/approve', [DonationRequestController::class, 'approve']);
Route::patch('/donation-requests/{id}/reject', [DonationRequestController::class, 'reject']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/recent-donations',[DashboardController::class, 'recentDonations']);
Route::get('/dashboard/recent-requests',[DashboardController::class, 'recentRequests']);