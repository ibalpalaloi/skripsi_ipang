<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skpd;

class ProdukController extends Controller

{
    public function produk()
    {
        $data_skpd = \App\Skpd::all();
    	$data_produk = \App\Produk::all();
		return view('produk.produk',['data_produk' => $data_produk, 'data_skpd' => $data_skpd]);
    }
    public function create(Request $request)
	{
        $this->validate($request,[
            'skpd' => 'required',
            'produk' => 'required'
        ]);

		$produk = new \App\Produk;
        $produk->skpd_id = $request->skpd;
        $produk->produk = $request->produk;
        $produk->save();

		return redirect('/produk')->with('Sukses','Data berhasil ditambah');
	}
    public function edit($id_produk)
    {
        $data_skpd = \App\Skpd::all();
    	$produk = \App\Produk::find($id_produk);
    	return view('produk/edit',['data_produk' => $produk,'data_skpd' => $data_skpd]);
    }
    public function delete($id_produk)
    {
    	\App\Produk::find($id_produk)->delete();
    	return redirect('/produk')->with('Sukses','Data Berhasil Dihapus');
    }

    public function ubah(Request $request,$id)
    {
        $produk = \App\Produk::find($id);
        $produk->skpd_id=$request->skpd;
        $produk->produk=$request->produk;
        $produk->save();
        return redirect('/produk')->with('Sukses','Data berhasil diubah');
    }
     public function tambah(Request $request)
    {
        $skpd = Skpd::all();
       return view('produk/tambah', ['data_skpd'=>$skpd]);
    }
}
