<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestFrontendController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');});
Route::get('/test/dashboard',[TestFrontendController::class, 'dashboard']);
Route::get('/test/donations',[TestFrontendController::class, 'donations']);
Route::get('/test/donations/{id}',[TestFrontendController::class, 'detail']);
Route::get('/test/login', [TestFrontendController::class, 'loginForm']);
Route::post('/test/login', [TestFrontendController::class, 'login']);
Route::get('/test/register', [TestFrontendController::class, 'registerForm']);
Route::post('/test/register', [TestFrontendController::class, 'register']);
Route::get('/test/admin-dashboard',[TestFrontendController::class, 'adminDashboard']);
Route::get('/test/donor-dashboard',[TestFrontendController::class, 'donorDashboard']);
Route::get('/test/recipient-dashboard',[TestFrontendController::class, 'recipientDashboard']);
Route::get('/test/create-donation',[TestFrontendController::class, 'createDonationForm']);
Route::post('/test/create-donation',[TestFrontendController::class, 'storeDonation']);
Route::get('/test/my-donations',[TestFrontendController::class, 'myDonations']);
Route::get('/test/logout',[TestFrontendController::class, 'logout']);
Route::get('/test/donor-requests',[TestFrontendController::class, 'donorRequests']);
Route::post('/test/request/{id}/approve',[TestFrontendController::class, 'approveRequest']);
Route::post('/test/request/{id}/reject',[TestFrontendController::class, 'rejectRequest']);
Route::get('/test/my-donations/{id}',[TestFrontendController::class, 'myDonationDetail']);
Route::get('/test/my-donations/{id}/edit',[TestFrontendController::class, 'editDonationForm']);
Route::post('/test/my-donations/{id}/edit',[TestFrontendController::class, 'updateDonation']);
Route::post('/test/my-donations/{id}/cancel',[TestFrontendController::class, 'cancelDonation']);
Route::get('/test/donations',[TestFrontendController::class, 'recipientDonations']);
Route::get('/test/donations/{id}',[TestFrontendController::class, 'recipientDonationDetail']);
Route::post('/test/donations/{id}/request',[TestFrontendController::class, 'submitRequest']);
Route::get('/test/my-requests',[TestFrontendController::class, 'myRequests']);
Route::get('/test/my-requests',[TestFrontendController::class, 'myRequests']);
Route::get('/test/my-requests/{id}',[TestFrontendController::class, 'requestDetail']);
Route::post('/test/my-requests/{id}/cancel',[TestFrontendController::class, 'cancelRequest']);
Route::get('/test/my-requests/filter/{status}',[TestFrontendController::class, 'filterRequests']);
Route::get('/test/admin/donations',[TestFrontendController::class, 'adminDonations']);
Route::get('/test/admin/requests',[TestFrontendController::class, 'adminRequests']);
Route::get('/test/admin/users',[TestFrontendController::class, 'adminUsers']);
Route::get('/about', function () {return view('about');});
Route::middleware('auth')->group(function () {

    Route::get(
        '/test/donor-dashboard',
        [TestFrontendController::class, 'donorDashboard']
    );

    Route::get(
        '/test/create-donation',
        [TestFrontendController::class, 'createDonationForm']
    );

    Route::post(
        '/test/create-donation',
        [TestFrontendController::class, 'storeDonation']
    );

    Route::get(
        '/test/my-donations',
        [TestFrontendController::class, 'myDonations']
    );

});

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {

    Route::get(
        '/test/admin-dashboard',
        [TestFrontendController::class, 'adminDashboard']
    );

    Route::get(
        '/test/admin/donations',
        [TestFrontendController::class, 'adminDonations']
    );

    Route::get(
        '/test/admin/requests',
        [TestFrontendController::class, 'adminRequests']
    );

});

Route::middleware([
    'auth',
    'role:donor'
])->group(function () {

    Route::get(
        '/test/donor-dashboard',
        [TestFrontendController::class, 'donorDashboard']
    );

    Route::get(
        '/test/create-donation',
        [TestFrontendController::class, 'createDonationForm']
    );

    Route::post(
        '/test/create-donation',
        [TestFrontendController::class, 'storeDonation']
    );

});

Route::middleware([
    'auth',
    'role:recipient'
])->group(function () {

    Route::get(
        '/test/recipient-dashboard',
        [TestFrontendController::class, 'recipientDashboard']
    );

    Route::get(
        '/test/donations',
        [TestFrontendController::class, 'recipientDonations']
    );

    Route::get(
        '/test/my-requests',
        [TestFrontendController::class, 'myRequests']
    );

});

Route::get(
    '/recipient/dashboard',
    [RecipientController::class,'dashboard']
);

Route::get(
    '/recipient/donations',
    [RecipientController::class,'donations']
);

Route::get(
    '/recipient/donations/{id}',
    [RecipientController::class,'detail']
);

Route::post(
    '/recipient/donations/{id}/request',
    [RecipientController::class,'submitRequest']
);

Route::get(
    '/recipient/status',
    [RecipientController::class,'status']
);

Route::get(
    '/recipient/history',
    [RecipientController::class,'history']
);

Route::get(
    '/recipient/history/{id}',
    [RecipientController::class,'historyDetail']
);

Route::get(
    '/recipient/profile',
    [RecipientController::class, 'profile']
);

Route::post(
    '/recipient/profile/update',
    [RecipientController::class,'updateProfile']
);

Route::get(
    '/admin/dashboard',
    [AdminController::class,'dashboard']
);

Route::get(
    '/admin/donations',
    [AdminController::class,'donations']
);

Route::get(
    '/admin/donations/{id}/edit',
    [AdminController::class,'editDonation']
);

Route::post(
    '/admin/donations/{id}/edit',
    [AdminController::class,'updateDonation']
);

Route::post(
    '/admin/donations/{id}/delete',
    [AdminController::class,'deleteDonation']
);

Route::get(
    '/admin/requests',
    [AdminController::class,'requests']
);

Route::post(
    '/admin/requests/{id}/approve',
    [AdminController::class,'approveRequest']
);

Route::post(
    '/admin/requests/{id}/reject',
    [AdminController::class,'rejectRequest']
);

Route::get(
    '/admin/users',
    [AdminController::class,'users']
);

Route::get(
    '/admin/users/{id}/edit',
    [AdminController::class,'editUser']
);

Route::post(
    '/admin/users/{id}/update',
    [AdminController::class,'updateUser']
);

Route::post(
    '/admin/users/{id}/delete',
    [AdminController::class,'deleteUser']
);

Route::get(
    '/admin/reports',
    [AdminController::class,'reports']
);

Route::get(
    '/admin/profile',
    [AdminController::class,'profile']
);

Route::post(
    '/admin/profile/update',
    [AdminController::class,'updateProfile']
);


Route::get(
    '/donor/dashboard',
    [DonorController::class,'dashboard']
);

Route::get(
    '/donor/donations/create',
    [DonorController::class,'createDonation']
);

Route::post(
    '/donor/donations/create',
    [DonorController::class,'storeDonation']
);

Route::get(
    '/donor/my-donations',
    [DonorController::class,'myDonations']
);

Route::get(
    '/donor/my-donations/{id}',
    [DonorController::class,'myDonationDetail']
);

Route::get(
    '/donor/my-donations/{id}/edit',
    [DonorController::class,'editDonation']
);

Route::post(
    '/donor/my-donations/{id}/edit',
    [DonorController::class,'updateDonation']
);

Route::post(
    '/donor/my-donations/{id}/cancel',
    [DonorController::class,'cancelDonation']
);

Route::get(
    '/donor/requests',
    [DonorController::class,'requests']
);

Route::get(
    '/donor/profile',
    [DonorController::class,'profile']
);

Route::post(
    '/donor/profile/update',
    [DonorController::class,'updateProfile']
);


Route::get(
    '/login',
    [AuthController::class,'loginForm']
);

Route::post(
    '/login',
    [AuthController::class,'login']
);

Route::get(
    '/register',
    [AuthController::class,'registerForm']
);

Route::post(
    '/register',
    [AuthController::class,'register']
);

Route::post(
    '/logout',
    [AuthController::class,'logout']
);