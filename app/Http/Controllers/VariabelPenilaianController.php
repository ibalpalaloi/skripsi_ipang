<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variabel_penilaian;
use PhpParser\Node\Expr\Variable;

class VariabelPenilaianController extends Controller
{
    //
    public function variabel_penilaian(){
        // $id = '1';
        // $var_1 = "variabel 1";
        // dd(${'var_'.$id});
        $variabel = Variabel_penilaian::all();
        return view('penilaian.variabel_penilaian', compact('variabel'));
    }

    public function post_variabel_penilaian(Request $request){
        $variabel = new variabel_penilaian;
        $variabel->variabel = $request->variabel_penilaian;
        $variabel->bobot = $request->bobot;
        $variabel->save();

        return redirect('/variabel-penilaian');
    }

    public function hapus_variabel_penilaian($id){
        Variabel_penilaian::where('id', $id)->delete();
        return back();
    }

    public function post_ubah_variabel_penilaian(Request $request, $id){
        $variabel = Variabel_penilaian::find($id);
        $variabel->variabel = $request->variabel_penilaian;
        $variabel->bobot = $request->bobot;
        $variabel->save();

        return redirect('/variabel-penilaian');
    }

    public function tambah_variabel_penilaian(){
        return view('/penilaian.tambah_variabel_penilaian');
    }

    public function ubah_variabel_penilaian($id){
        $variabel_penilaian = Variabel_penilaian::find($id);
        return view('penilaian.ubah_variabel_penilaian', compact('variabel_penilaian', 'id'));
    }
}
