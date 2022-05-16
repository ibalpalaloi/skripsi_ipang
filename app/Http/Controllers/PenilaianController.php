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
use App\Parameter_penilaian;
use App\Penilaian;
use App\Periode;
use Mockery\Generator\Parameter;

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

	public function tenaga_teknis($id_kantor, $id_periode){
		$tenaga_teknis = Tenaga_teknis::where('wilayah_id', $id_kantor)->get();
		$data_tenaga_teknis = array();
		$i = 0;
		foreach($tenaga_teknis as $data){
			$data_tenaga_teknis[$i]['id'] = $data->id;
			$data_tenaga_teknis[$i]['nama'] = $data->nama;
			$data_tenaga_teknis[$i]['no_registrasi'] = $data->no_registrasi;
			$hasil_penilaian = Hasil_penilaian::where([
				['tenaga_teknis_id', $data->id],
				['periode_id', $id_periode]
			])->first();
			if(!empty($hasil_penilaian)){
				$nilai = $hasil_penilaian->nilai;
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
 		return view('penilaian.daftar_tenaga_teknis', compact('data_tenaga_teknis', 'id_kantor', 'id_periode'));
	}

	public function periode($id){
		$periode = Periode::all();
		$data_periode = array();
		$i=0;
		foreach($periode as $data){
			$data_periode[$i]['id'] = $data->id;
			$data_periode[$i]['periode'] = $data->periode;
			$i++;
		}
		return view('penilaian.periode', compact('data_periode', 'id'));
	}

	public function penilaian($id, $id_periode){
		$variabel_penilaian = Variabel_penilaian::all();
		$data_variabel = array();
		$i=0;
		foreach($variabel_penilaian as $data){
			$data_variabel[$i]['id'] = $data->id;
			$data_variabel[$i]['variabel'] = $data->variabel;
			$data_variabel[$i]['parameter'] =  Parameter_penilaian::where('variabel_penilaian_id', $data->id)->orderBy('nilai', 'asc')->get();
			$i++;
		}
		// dd($data_variabel);
		return view('penilaian.penilaian', compact('variabel_penilaian', 'id', 'data_variabel', 'id_periode'));
	}

	public function post_penilaian(Request $request, $id, $id_periode){
		$data_request = $request->all();
		// dd($data_request);
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
			$parameter_nilai_tertinggi = Parameter_penilaian::where('variabel_penilaian_id', $data->id)->orderBy('nilai', 'desc')->first();
			if(!empty($parameter_nilai_tertinggi)){
				$data_variabel_penilaian[$i]['nilai_utility'] =  ($data_request['variabel_'.$data->id] - 0) / ( $parameter_nilai_tertinggi->nilai - 0) * 100;

			}
			else{
				$data_variabel_penilaian[$i]['nilai_utility'] =  0;

			}

			$i++;
		}
		
		$nilai_akhir = 0;
		Penilaian::where([
			['tenaga_teknis_id', $id],
			['periode_id', $id_periode]
		])->delete();

		foreach($data_variabel_penilaian as $data){
			$nilai_akhir += $data['nilai_utility'] * $data['nilai_normalisasi'];
			$periode = new Penilaian;
			$periode->periode_id = $id_periode;
			$periode->variabel_penilaian_id =$data['id'];
			$periode->tenaga_teknis_id = $id;
			$periode->nilai_normalisasi = $data['nilai_normalisasi'];
			$periode->utility = $data['nilai_utility'];
			$periode->save();
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
		$hasil_penilaian->periode_id =  1;
		$hasil_penilaian->save();

		$tenaga_teknis = Tenaga_teknis::find($id);
		$id_wilayah = $tenaga_teknis->wilayah_id;

		return view('penilaian.hasil_penilaian', compact('data_variabel_penilaian', 'nilai_akhir', 'hasil_rentang_nilai', 'id_periode', 'id_wilayah'));
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

	public function parameter_penilaian($id){
		$variabel_penilaian = Variabel_penilaian::find($id);
		$parameter = Parameter_penilaian::where('variabel_penilaian_id', $id)->get();
		return view('penilaian.parameter_penilaian', compact('parameter', 'id', 'variabel_penilaian'));
	}

	public function tambah_parameter_penilaian($id){
		return view('penilaian.tambah_parameter_penilaian', compact('id'));
	}

	public function post_parameter_penilaian(Request $request, $id){
		$parameter = new Parameter_penilaian;
		$parameter->variabel_penilaian_id = $id;
		$parameter->parameter = $request->parameter_penilaian;
		$parameter->nilai = $request->nilai;
		$parameter->save();

		return redirect("/parameter-penilaian/".$id);
	}

	public function hapus_parameter_penilaian($id){
		Parameter_penilaian::where('id', $id)->delete();

		return back();
	}

	public function ubah_parameter_penilaian($id){
		$parameter = Parameter_penilaian::find($id);

		return view('penilaian.ubah_parameter_penilaian', compact('parameter', 'id'));
	}

	public function post_ubah_parameter_penilaian(Request $request, $id){
		$parameter = Parameter_penilaian::find($id);
		$parameter->parameter = $request->parameter_penilaian;
		$parameter->nilai = $request->nilai;
		$parameter->save();

		return redirect('/parameter-penilaian/'.$parameter->variabel_penilaian_id);
	}

	public function detail_penilaian($id, $id_periode){
		$hasil_penilaian = Hasil_penilaian::where([
			['tenaga_teknis_id', $id],
			['periode_id', $id_periode]
		])->first();

		$penilaian = Penilaian::where([
			['tenaga_teknis_id', $id],
			['periode_id', $id_periode]
		])->get();

		$tenaga_teknis = Tenaga_teknis::find($id);
		$id_wilayah = $tenaga_teknis->wilayah_id;

		return view('penilaian.detail_penilaian', compact('hasil_penilaian', 'penilaian', 'id_periode', 'id_wilayah'));
	}
}
