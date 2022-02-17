<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantor;
use App\Wilayah;

class KantorController extends Controller
{
    //
    public function kantor(){
        $kantor = Kantor::all();
        return view('kantor.kantor', compact('kantor'));
    }

    public function post_kantor(Request $request){
        $kantor = new Kantor;
        $kantor->wilayah_id = $request->wilayah_id;
        $kantor->nama = $request->kantor;
        $kantor->save();
        
        return redirect('/kantor');
    }

    public function hapus_kantor($id){
        Kantor::where('id', $id)->delete();

        return back();
    }

    public function tambah_kantor(){
        $wilayah = Wilayah::all();
        return view('/kantor.tambah_kantor', compact('wilayah'));
    }
}
