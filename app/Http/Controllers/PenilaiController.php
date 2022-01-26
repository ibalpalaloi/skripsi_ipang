<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaiController extends Controller
{
   public function penilai()
    {
    	$data_skpd = \App\Skpd::all();
        $data_penilai = \App\Penilai::all();
        return view('penilai.penilai',['data_penilai' => $data_penilai, 'data_skpd' => $data_skpd]);
    }
    public function create(Request $request)
	{
        $this->validate($request,[
            'nama' => 'required',
            'skpd' => 'required']);

        $penilai = new \App\Penilai;
        $penilai->nama = $request->nama;
        $penilai->skpd_id = $request->skpd;
        $penilai->save();

		return redirect('/penilai')->with('Sukses','Data berhasil ditambah');
	}
    public function edit($id_penilai)
    {
    	$penilai = \App\Penilai::find($id_penilai);
        $skpd = \App\Skpd::all();
    	return view('penilai/edit', ['data_penilai'=>$penilai, 'data_skpd'=>$skpd]);
    }
    public function delete($id_penilai)
    {
    	$penilai = \App\Penilai::where('id',$id_penilai) -> delete();
    	return redirect('/penilai')->with('Sukses','Data Berhasil Dihapus');
    }

    public function ubah(Request $request,$id)
    {
        $penilai = \App\Penilai::find($id);
        $penilai->nama = $request->nama;
        $penilai->skpd_id = $request->skpd;
        $penilai->save();
        return redirect('/penilai')->with('Sukses','Data berhasil diubah');
    }

    public function tambah(Request $request)
    {
        $data_skpd = \App\Skpd::all();
       return view('penilai/tambah', ['data_skpd'=>$data_skpd]);
    }
}
