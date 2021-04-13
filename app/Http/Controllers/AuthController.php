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
        $message = [
            'nim.exists'   => 'NIM belum terdaftar.',
            'token.exists' => 'Token tidak valid.',
            'min'          => 'Token minimal :min karakter.',
        ];

        $request->validate([
            'nim'   => 'required|string|exists:voters,nim',
            'token' => 'required|string|min:6|exists:voters,token',
        ], $message);

        $voter = Voter::where($request->only('nim', 'token'))->firstOrFail();

        if (Auth::guard('voter')->loginUsingId($voter->id)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Alert::error('Error', 'Tidak dapat login!');

        return back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('voter')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
