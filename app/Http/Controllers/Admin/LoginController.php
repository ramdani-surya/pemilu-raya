<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.data');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Username atau Password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('admin.login'));
    }
}
