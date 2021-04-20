<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nim'   => 'required|string',
            'token' => 'required|string',
        ]);

        $voter = Voter::where($request->only('nim', 'token'))->first();

        if ($voter && Auth::guard('voter')->loginUsingId($voter->id)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return view('login_error');
    }

    public function logout(Request $request)
    {
        Auth::guard('voter')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
