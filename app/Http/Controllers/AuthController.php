<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $nim = $request->get('nim') ?: null;
        $token = $request->get('token') ?: null;

        return view('login', compact('nim','token'));
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim'   => 'required|string',
            'token' => 'required|string',
        ],[
            'nim.required' => 'NIM / NPM tidak boleh kosong',
            'token.required' => 'Token tidak boleh kosong',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('login')->withErrors($validator)->withInput();
        }

        $voter = Voter::where($request->only('nim', 'token'))->first();

        if ($voter && Auth::guard('voter')->loginUsingId($voter->id)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }else{
            $validator->getMessageBag()->add('wrong', 'NIM/NPM dan Token yang anda masukan tidak cocok !');
            return Redirect::route('login')->withErrors($validator)->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('voter')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
