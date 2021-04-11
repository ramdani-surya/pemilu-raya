<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id')->get();
        
        return view('admin.manajemenAkun.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|min:3|max:35',
            'username' => 'required|string|min:3|max:35',
            'email' => 'required|string|min:3|max:35',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

    
        
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];
        
        
        User::create($data)
        ? Alert::success('Sukses', "User berhasil dihapus.")
        : Alert::error('Error', "User gagal dihapus!");
        return redirect(route('users.index'));
    }

    public function clearAll()
    {
        $users = User::all();

        foreach ($users as $user) {
            

            $user->delete();
        }

        (count(User::all()) < 1)
            ? Alert::success('Sukses', "Users berhasil dibersihkan.")
            : Alert::error('Error', "Users gagal dibersihkan!");

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'edit_name' => 'required|string|min:3|max:35',
            'edit_username' => 'required|string|min:3|max:35',
            'edit_email' => 'required|string|min:3|max:35',
            'edit_password' => 'required',
            'edit_role' => 'required',
        ]);

    
        
        $data = [
            'name' => $request->edit_name,
            'username' => $request->edit_username,
            'email' => $request->edit_email,
            'password' => Hash::make($request->edit_password),
            'role' => $request->edit_role,
        ];

        $user->update($data)
            ? Alert::success('Sukses', "User berhasil diubah.")
            : Alert::error('Error', "User gagal diubah!");

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $candidate->delete()
        ? Alert::success('Sukses', "User berhasil dihapus.")
        : Alert::error('Error', "User gagal dihapus!");
    return redirect(route('users.index'));
    }
}
