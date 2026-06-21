<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user
        ]);
    }
    public function register(Request $request)
    {
    $request->validate([
    'name' => 'required|max:255',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:8',
    'role' => 'required|in:donor,recipient',
    ]);
    if ($request->role === 'recipient') {

    $request->validate([
        'organization_name' => 'required',
        'organization_phone' => 'required',
        'organization_address' => 'required',
    ]);

    }

    $user = User::create([
    'id' => Str::uuid()->toString(),
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password),

    'role' => $request->role,

    'organization_name' => $request->organization_name,
    'organization_email' => $request->organization_email,
    'organization_phone' => $request->organization_phone,
    'organization_address' => $request->organization_address,

    'is_active' => 1,
    ]);

    return response()->json([
        'message' => 'Register berhasil',
        'user' => $user
    ], 201);
}
}
