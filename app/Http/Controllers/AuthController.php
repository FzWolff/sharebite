<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(
            'email',
            'password'
        );

        if(!Auth::attempt($credentials))
        {
            return back()->with(
                'error',
                'Email atau password salah'
            );
        }

        $user = Auth::user();

        if($user->role == 'admin')
        {
            return redirect('/admin/dashboard');
        }

        if($user->role == 'donor')
        {
            return redirect('/donor/dashboard');
        }

        if($user->role == 'recipient')
        {
            return redirect('/recipient/dashboard');
        }

        Auth::logout();

        return back()->with(
            'error',
            'Role tidak dikenali'
        );
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
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'organization_name'=> $request->organization_name,
            'organization_email' => $request->organization_email,
            'organization_phone' => $request->organization_phone,
            'organization_address'=> $request->organization_address,
            'is_active' => 1
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Register berhasil, silakan login'
            );
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}