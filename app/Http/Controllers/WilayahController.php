<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;

class WilayahController extends Controller
{
    //
    public function wilayah(){
        $wilayah = Wilayah::all();
        return view('wilayah.wilayah', compact('wilayah'));
    }

    public function post_wilayah(Request $request){
        $wilayah = new Wilayah;
        $wilayah->wilayah = $request->wilayah;
        $wilayah->save();
        return redirect('/wilayah');
    }

    public function hapus_wilayah($id){
        Wilayah::where('id', $id)->delete();
        
        return back();
    }

    public function tambah_wilayah(){
        return view('/wilayah.tambah_wilayah');
    }

    public function ubah_wilayah($id){
        $wilayah = Wilayah::find($id);
        
        return view('wilayah.ubah_wilayah', compact('wilayah'));
    }

    public function post_ubah_wilayah(Request $request){
        $wilayah = Wilayah::find($request->id);
        $wilayah->wilayah = $request->wilayah;
        $wilayah->save();

        return redirect('/wilayah');
    }
}
