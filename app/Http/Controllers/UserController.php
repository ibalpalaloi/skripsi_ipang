<?php

namespace App\Http\Controllers;

use App\User_wilayah;
use App\Wilayah;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
    	$data_user = \App\User::where('role', 'admin')->get();
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

        if($request->role != "superadmin"){
            $user_wilayah = new User_wilayah;
            $user_wilayah->wilayah_id  = $request->wilayah;
            $user_wilayah->user_id = $user->id;
            $user_wilayah->save();
        }
        

		return redirect('/pengguna')->with('Sukses','Data berhasil ditambah');
    }
    public function edit($id_user)
    {
    	$user = \App\User::find($id_user);
    	return view('user/edit',['user'=>$user]);
    }
    public function delete($id_user)
    {
    	\App\User::find($id_user)->delete();
        User_wilayah::where('user_id', $id_user)->delete();
        return redirect('/pengguna')->with('Sukses','Data Berhasil Dihapus');
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
        $wilayah = Wilayah::all();
        return view('user/tambah', compact('wilayah'));
    }
}
