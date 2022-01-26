<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Skpd;
use App\Produk;
use App\Hasil_penilaian;

class PenilaianController extends Controller
{
	public function Penilaian()
	{
		$data_skpd = \App\Skpd::all();
        $data_produk = \App\Produk::all();
    	$data_penilaian = \App\Penilaian::all();
		return view('penilaian.penilaian',['data_penilaian' => $data_penilaian,'data_skpd' => $data_skpd,'data_produk' => $data_produk]);
	}
	
	public function nilai(Request $request){
		$this->validate($request,[
            'skpd' => 'required',
            'produk' => 'required'
        ]);
		$kriteria = Kriteria::all();
		$skpd = Skpd::find($request->skpd);
		$produk = Produk::find($request->produk);
		$nilai_k = array();
		$k='k';
		$parameter_k = array();
		for($i = 1; $i<21; $i++){
			$k_ = $k.$i;
			array_push($nilai_k, $request->$k_);
			if($request->$k_ == 1){
				array_push($parameter_k, 'Ya');
			}
			else{
				array_push($parameter_k, 'Tidak');
			}
			
		}

		$penilaian = Hasil_penilaian::where('produk_id', $produk->id)->delete();
		$penilaian = new Hasil_penilaian;
		$penilaian->skpd_id = $skpd->id;
		$penilaian->produk_id = $produk->id;
		$penilaian->kriteria_1 = $request->k1;
		$penilaian->kriteria_2 =  $request->k2;
		$penilaian->kriteria_3 = $request->k3;
		$penilaian->kriteria_4 = $request->k4;
		$penilaian->kriteria_5 = $request->k5;
		$penilaian->kriteria_6 = $request->k6;
		$penilaian->kriteria_7 = $request->k7;
		$penilaian->kriteria_8 = $request->k8;
		$penilaian->kriteria_9 = $request->k9;
		$penilaian->kriteria_10 = $request->k10;
		$penilaian->kriteria_11 = $request->k11;
		$penilaian->kriteria_12 = $request->k12;
		$penilaian->kriteria_13 = $request->k13;
		$penilaian->kriteria_14 = $request->k14;
		$penilaian->kriteria_15 = $request->k15;
		$penilaian->kriteria_16 = $request->k16;
		$penilaian->kriteria_17 = $request->k17;
		$penilaian->kriteria_18 = $request->k18;
		$penilaian->kriteria_19 = $request->k19;
		$penilaian->kriteria_20 = $request->k20;
		$penilaian->save();

		$jumlah_bobot = 0;
		$nilai_normalisasi = array();
		foreach($kriteria as $data){
			$jumlah_bobot += $data->bobot;
		}

		foreach($kriteria as $data){
			$nilai_normal = $data->bobot / $jumlah_bobot;
			$nilai_normal = substr($nilai_normal, 0,5);
			array_push($nilai_normalisasi, $nilai_normal);
		}

		$nilai_utility = array();
		foreach($nilai_k as $data){
			$i = (($data - 0) / (1-0)) * 100;
			array_push($nilai_utility, $i);
		}

		$nilai_akhir=0;
		for($i=0; $i<20; $i++){
			$utility_normalisasi = $nilai_utility[$i] * $nilai_normalisasi[$i];
			$nilai_akhir += $utility_normalisasi;
		}

		$produk = Produk::find($request->produk);
		$produk->nilai = $nilai_akhir;
		$produk->tahun_penilaian = date('Y');
		$produk->save();
		
		return view('penilaian.hasil_penilaian', [
			'nilai_normalisasi' => $nilai_normalisasi,
			'parameter_k' => $parameter_k,
			'kriteria' => $kriteria,
			'nilai_utility'=>$nilai_utility,
			'nilai_akhir'=>$nilai_akhir,
			'skpd'=>$skpd,
			'produk' => $produk
		]);
	}
   
   public function hasil()
   {
	$skpd = Skpd::all();
   	return view('penilaian.hasil', ['skpd'=> $skpd]);
   }

   public function layanan($id){
	   $produk = Produk::where('skpd_id', $id)->get();
	   $rata = 0;
	   $bagi = 0;
	   $tahun = date('Y');
	   foreach($produk as $data){
			if(empty($data->nilai)){
				$nilai = 0;
			}
			else{
				$nilai = $data->nilai;
			}

			$rata += $nilai;
			$bagi++;
	   }
	   $rata = $rata / $bagi;
	   if($rata >= 0 and $rata <=50){
		   $hasil = 'Rendah';
	   }
	   elseif($rata >= 51 and $rata <=80){
		   $hasil = 'Sedang';
	   }
	   else{
		   $hasil = 'Tinggi';
	   }
	   return view('penilaian.layanan', ['produk'=>$produk, 'rata'=> $rata, 'hasil'=>$hasil]);
   }

   public function delete($id)
   {
   	$produk = Produk::find($request->$id)->delete();
   	return redirect('/layanan/{id}')->with('Sukses','Data Berhasil Dihapus');
   }

   public function get_produk(Request $request){
        $produk = \App\Produk::where('skpd_id', $request->id)->get();
        $output =  '<option value=""></option>';
        foreach($produk as $data){
            $output .= '<option value="'.$data->id.'">'.$data->produk.'</option>';
        }
        echo $output;
    }

    public function detail($id){
    	$penilaian = Hasil_penilaian::where('produk_id', $id)->first();
    	$kriteria = Kriteria::all();
		$skpd = Skpd::find($penilaian->skpd_id);
		$produk = Produk::find($penilaian->produk_id);
		$nilai_k = array();
		$k='kriteria_';
		$parameter_k = array();
		for($i = 1; $i<21; $i++){
			$k_ = $k.$i;
			array_push($nilai_k, $penilaian->$k_);
			if($penilaian->$k_ == 1){
				array_push($parameter_k, 'Ya');
			}
			else{
				array_push($parameter_k, 'Tidak');
			}
			
		}
		$jumlah_bobot = 0;
		$nilai_normalisasi = array();
		foreach($kriteria as $data){
			$jumlah_bobot += $data->bobot;
		}

		foreach($kriteria as $data){
			$nilai_normal = $data->bobot / $jumlah_bobot;
			$nilai_normal = substr($nilai_normal, 0,5);
			array_push($nilai_normalisasi, $nilai_normal);
		}

		$nilai_utility = array();
		foreach($nilai_k as $data){
			$i = (($data - 0) / (1-0)) * 100;
			array_push($nilai_utility, $i);
		}

		$nilai_akhir=0;
		for($i=0; $i<20; $i++){
			$utility_normalisasi = $nilai_utility[$i] * $nilai_normalisasi[$i];
			$nilai_akhir += $utility_normalisasi;
		}

		$produk->nilai = $nilai_akhir;
		$produk->tahun_penilaian = date('Y');
		$produk->save();

		return view('penilaian.detail_penilaian', [
			'nilai_normalisasi' => $nilai_normalisasi,
			'parameter_k' => $parameter_k,
			'kriteria' => $kriteria,
			'nilai_utility'=>$nilai_utility,
			'nilai_akhir'=>$nilai_akhir,
			'skpd'=>$skpd,
			'produk' => $produk
		]);
    }
}
