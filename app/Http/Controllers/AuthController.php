<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Check if user is admin
            /** @var User $user */
            $user = Auth::user();
            if ($user && $user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Anda tidak memiliki akses admin.',
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }

    /**
     * Debug route untuk test login
     */
    public function debugLogin()
    {
        $user = User::where('email', 'admin@desatetembomua.com')->first();
        if ($user) {
            return response()->json([
                'user_exists' => true,
                'email' => $user->email,
                'role' => $user->role,
                'status' => $user->status,
                'password_check' => \Illuminate\Support\Facades\Hash::check('password123', $user->password)
            ]);
        }
        return response()->json(['user_exists' => false]);
    }
}
