<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkpdController extends Controller
{
	public function skpd()
	{
		$data_skpd = \App\Skpd::all();
		return view('skpd.skpd',['data_skpd' => $data_skpd]);
	}
	public function create(Request $request)
	{
        $this->validate($request,[
            'kelompok_instansi' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'skpd' => 'required',
            'alamat' => 'required'
        ]);

		\App\skpd::create($request->all());
		return redirect('/skpd')->with('Sukses','Data berhasil ditambah');
	}
    public function edit($id_skpd)
    {
    	$skpd = \App\Skpd::find($id_skpd );
    	return view('skpd/edit',['skpd'=>$skpd]);
    }
    public function delete($id_skpd)
    {
    	\App\Skpd::find($id_skpd)->delete();
        return redirect('/skpd')->with('Sukses','Data Berhasil Dihapus');
    }
    public function ubah(Request $request,$id)
    {
        $skpd = \App\Skpd::find($id);
        $skpd->kelompok_instansi=$request->kelompok_instansi;
        $skpd->provinsi=$request->provinsi;
        $skpd->kabupaten_kota=$request->kabupaten_kota;
        $skpd->skpd = $request->skpd;
        $skpd->alamat=$request->alamat;
        $skpd->save();
        return redirect('/skpd')->with('Sukses','Data berhasil diubah');
    }
    public function tambah(Request $request)
    {
       return view('skpd/tambah');
    }
}
