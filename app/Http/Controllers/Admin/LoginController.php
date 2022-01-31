<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Storage;
use Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.data');
    }

    
    public function setting(Request $request)
    {
        return view('admin.setting.data');
    }

    public function update_account(Request $request, User $user)
    {
        
        $this->validate($request, [
            'edit_name' => 'required|min:3|max:55',
            'edit_username' => "required|min:3|unique:users,username,$user->id|max:55",
            'edit_email' => "required|min:5|unique:users,email,$user->id|max:55",
            'edit_image' => "mimes:jpeg,jpg,png|max:20000",
        ],
        [
            'edit_name.required' => 'Nama harus di isi.',
            'edit_name.min' => 'Minimal karakter yang dimasukan harus lebih dari 3 karakter',
            'edit_name.max' => 'Maksimal karakter yang dimasukan harus kurang dari 55 karakter',
            
            'edit_username.required' => 'Username harus di isi.',
            'edit_username.min' => 'Minimal karakter yang dimasukan harus lebih dari 3 karakter',
            'edit_username.max' => 'Maksimal karakter yang dimasukan harus kurang dari 55 karakter',

            'edit_email.required' => 'Email harus di isi.',
            'edit_email.unique' => 'Email sudah ada.',
            'edit_email.min' => 'Minimal karakter yang dimasukan harus lebih dari 3 karakter',
            'edit_email.max' => 'Maksimal karakter yang dimasukan harus kurang dari 55 karakter',

            'edit_image.required' => 'Email harus di isi.',
            'edit_image.mimes' => 'Gambar yang di upload harus berformat dari: jpeg, jpg, png.',
            'edit_image.max' => 'Maksimal Gambar yang di upload tidak boleh lebih dari 20 MB.',
        ]);

        if($request->hasFile('edit_image')) {
            if(Storage::exists($user->image) && !empty($user->image)) {
                Storage::delete($user->image);
            }

            $edit_image = $request->file("edit_image")->store("/public/input/users");
        }   


        $data = [
            'name' => $request->edit_name ? $request->edit_name : $user->name,
            'username' => $request->edit_username ? $request->edit_username : $user->username,
            'email' => $request->edit_email ? $request->edit_email : $user->email,
            'image' => $edit_image,
        ];

        $user->update($data)
            ? Alert::success('Sukses', "Akun anda berhasil diubah.")
            : Alert::error('Error', "Akun anda gagal diubah!");

        return redirect(route('admin.setting'));
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
           Alert::error('Error', 'Username atau Password yang anda masukan salah!');
           return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('admin.login'));
    }
}
