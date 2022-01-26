<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
    	$data_user = \App\User::all();
    	return view('user.user',['data_user' => $data_user]);
    }

    public function create(Request $request)
    {
    	
    	$user = new \App\User;
    	$user->name = $request->nama;
        $user->username = $request->username;
        $user->role = $request->role;
    	$user->password = bcrypt($request->password);
    	$user->remember_token = str_random(60);
    	$user->save();
		return redirect('/user')->with('Sukses','Data berhasil ditambah');
    }
    public function edit($id_user)
    {
    	$user = \App\User::find($id_user);
    	return view('user/edit',['user'=>$user]);
    }
    public function delete($id_user)
    {
    	\App\User::find($id_user)->delete();
        return redirect('/user')->with('Sukses','Data Berhasil Dihapus');
    }
    public function ubah(Request $request,$id)
    {
        $user = \App\User::find($id);
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/user')->with('Sukses','Data berhasil diubah');
    }

    public function tambah(Request $request)
    {
       return view('user/tambah');
    }
}
