<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Skpd;
use App\Produk;
use App\Hasil_penilaian;
use App\Kantor;
use App\Tenaga_teknis;
use App\Variabel_penilaian;
use App\Wilayah;

class PenilaianController extends Controller
{
	public function kantor(){
		if(Auth()->user()->role == "admin"){
			$wilayah = Wilayah::where('id', Auth()->user()->user_wilayah->wilayah_id)->get();
		}
		else{
			$wilayah = Wilayah::all();
		}
		return view('/penilaian.daftar_kantor', compact('wilayah'));
	}

	public function tenaga_teknis($id){
		$tenaga_teknis = Tenaga_teknis::where('wilayah_id', $id)->get();
		$data_tenaga_teknis = array();
		$i = 0;
		foreach($tenaga_teknis as $data){
			$data_tenaga_teknis[$i]['id'] = $data->id;
			$data_tenaga_teknis[$i]['nama'] = $data->nama;
			$data_tenaga_teknis[$i]['no_registrasi'] = $data->no_registrasi;
			if($data->hasil_penilaian){
				$nilai = $data->hasil_penilaian->nilai;
				$data_tenaga_teknis[$i]['nilai'] = $nilai;
				if($nilai >= 0 && $nilai <= 50){
					$rentang_nilai = 'Rendah';
				}
				elseif($nilai > 51 && $nilai <= 80){
					$rentang_nilai = 'Sedang';
				}
				else{
					$rentang_nilai = 'Tinggi';
				}
				$data_tenaga_teknis[$i]['rentang'] = $rentang_nilai;

			}
			else{
				$data_tenaga_teknis[$i]['nilai'] = '-';
				$data_tenaga_teknis[$i]['rentang'] = '-';
			}
			$i++;
		}
 		return view('penilaian.daftar_tenaga_teknis', compact('data_tenaga_teknis', 'id'));
	}

	public function penilaian($id){
		$variabel_penilaian = Variabel_penilaian::all();
		return view('penilaian.penilaian', compact('variabel_penilaian', 'id'));
	}

	public function post_penilaian(Request $request, $id){
		$data_request = $request->all();
		$variabel_penilaian = Variabel_penilaian::all();
		$data_variabel_penilaian = array();
		$jumlah_bobot = Variabel_penilaian::sum('bobot');
		$i = 0;
		foreach($variabel_penilaian as $data){
			$data_variabel_penilaian[$i]['id'] = $data->id;
			$data_variabel_penilaian[$i]['variabel'] = $data->variabel;
			$data_variabel_penilaian[$i]['bobot'] = $data->bobot;
			$data_variabel_penilaian[$i]['nilai_normalisasi'] = $data->bobot / $jumlah_bobot;
			$data_variabel_penilaian[$i]['nilai_variabel'] = $data_request['variabel_'.$data->id];
			$data_variabel_penilaian[$i]['nilai_utility'] =  ($data_request['variabel_'.$data->id] - 0) / ( 4 - 0) * 100;

			$i++;
		}
		
		$nilai_akhir = 0;

		foreach($data_variabel_penilaian as $data){
			$nilai_akhir += $data['nilai_utility'] * $data['nilai_normalisasi'];
		}

		if($nilai_akhir >= 0 && $nilai_akhir <= 50){
			$hasil_rentang_nilai = "Rendah";
		}
		elseif($nilai_akhir > 50 && $nilai_akhir <= 80){
			$hasil_rentang_nilai = "Sedang";
		}
		else{
			$hasil_rentang_nilai = "Tinggi";
		}

		Hasil_penilaian::where('tenaga_teknis_id', $id)->delete();

		$hasil_penilaian = new Hasil_penilaian;
		$hasil_penilaian->tenaga_teknis_id = $id;
		$hasil_penilaian->nilai = $nilai_akhir;
		$hasil_penilaian->save();

		return view('penilaian.hasil_penilaian', compact('data_variabel_penilaian', 'nilai_akhir', 'hasil_rentang_nilai'));
	}

	public function print_tenaga_teknis($id){
		$tenaga_teknis = Tenaga_teknis::where('wilayah_id', $id)->get();
		$wilayah = Wilayah::find($id);
		$data_tenaga_teknis = array();
		$i = 0;
		foreach($tenaga_teknis as $data){
			$data_tenaga_teknis[$i]['id'] = $data->id;
			$data_tenaga_teknis[$i]['nama'] = $data->nama;
			$data_tenaga_teknis[$i]['no_registrasi'] = $data->no_registrasi;
			if($data->hasil_penilaian){
				$nilai = $data->hasil_penilaian->nilai;
				$data_tenaga_teknis[$i]['nilai'] = $nilai;
				if($nilai >= 0 && $nilai <= 50){
					$rentang_nilai = 'Rendah';
				}
				elseif($nilai > 51 && $nilai <= 80){
					$rentang_nilai = 'Sedang';
				}
				else{
					$rentang_nilai = 'Tinggi';
				}
				$data_tenaga_teknis[$i]['rentang'] = $rentang_nilai;

			}
			else{
				$data_tenaga_teknis[$i]['nilai'] = '-';
				$data_tenaga_teknis[$i]['rentang'] = '-';
			}
			$i++;
		}
		return view('penilaian.print_daftar_tenaga_teknis', compact('data_tenaga_teknis', 'id', 'wilayah'));
	}
}
