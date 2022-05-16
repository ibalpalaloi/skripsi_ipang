<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;

class PeriodeController extends Controller
{
    //
    public function periode(){
        $periode = Periode::all();
        return view('periode.periode', compact('periode'));
    }

    public function create(){
        return view('periode.tambah_periode');
    }

    public function create_post(Request $request){
        $cek_periode = Periode::where('periode', $request->periode)->get();
        if(count($cek_periode)> 0 ){
            return redirect('/periode')->with('error', 'Periode Telah Tersedia');
        }
        else{
            $periode = new Periode;
            $periode->periode = $request->periode;
            $periode->save();
            return redirect('/periode')->with('success', 'Periode Ditambahkan');
        }
    }

    public function edit($id){
        $periode = Periode::find($id);
        return view('periode.edit_periode', compact('periode'));
    }

    public function post_edit(Request $request){
        $periode = Periode::find($request->id);
        $periode->periode = $request->periode;
        $periode->save();

        return redirect('/periode');
    }
}
