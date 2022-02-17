<?php

namespace App\Http\Controllers;

use App\Kantor;
use Illuminate\Http\Request;
use App\Tenaga_teknis;
use App\Wilayah;

class TenagaTeknisController extends Controller
{
    //
    public function tenaga_teknis(){
        if(Auth()->user()->role == 'admin'){
            $tenaga_teknis = Tenaga_teknis::where('wilayah_id', Auth()->user()->user_wilayah->wilayah_id)->get();
        }
        else{
            $tanaga_teknis = Tenaga_teknis::all();
        }
        
        return view('tenaga_teknis.tenaga_teknis', compact('tenaga_teknis'));
    }

    public function post_tenaga_teknis(Request $request){
        $tenaga_teknis = new Tenaga_teknis;
        $tenaga_teknis->wilayah_id = $request->wilayah_id;
        $tenaga_teknis->no_registrasi = $request->no_registrasi;
        $tenaga_teknis->nama = $request->nama;
        $tenaga_teknis->tempat_lahir = $request->tempat_lahir;
        $tenaga_teknis->tgl_lahir = $request->tgl_lahir;
        $tenaga_teknis->save();

        return redirect('/tenaga_teknis');
    }

    public function hapus_tenaga_teknis($id){
        Tenaga_teknis::where('id', $id)->delete();
        return back();
    }

    public function tambah_tenaga_teknis(){
        if(Auth()->user()->role == "admin"){
			$wilayah = Wilayah::where('id', Auth()->user()->user_wilayah->wilayah_id)->get();
		}
		else{
			$wilayah = Wilayah::all();
		}
        return view('/tenaga_teknis.tambah_tanaga_teknis', compact('wilayah'));
    }
}
