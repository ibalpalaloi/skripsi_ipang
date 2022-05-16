<?php

namespace App\Http\Controllers;

use App\Hasil_penilaian;
use App\Periode;
use Illuminate\Http\Request;
use App\Tenaga_teknis;
use Auth;
use PDF;

class HomeController extends Controller
{
    public function index($id)
    {
		if(Auth::Check()){
			if(Auth()->user()->role == "admin"){
				$tenaga_teknis = Tenaga_teknis::where('wilayah_id', Auth()->user()->user_wilayah->wilayah_id)->get();
			}
			else{
				$tenaga_teknis = Tenaga_teknis::all();
			}
		}
		else{
			$tenaga_teknis = Tenaga_teknis::all();
		}
        
        
		$data_tenaga_teknis = array();
		$i = 0;
		foreach($tenaga_teknis as $data){
			$data_tenaga_teknis[$i]['id'] = $data->id;
			$data_tenaga_teknis[$i]['nama'] = $data->nama;
			$data_tenaga_teknis[$i]['no_registrasi'] = $data->no_registrasi;
			$data_tenaga_teknis[$i]['wilayah'] = $data->wilayah->wilayah;
			$hasil_penilaian = Hasil_penilaian::where([
				['periode_id', $id],
				['tenaga_teknis_id', $data->id]
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
        return view('home.home', compact('data_tenaga_teknis', 'id'));
    	// return view('home.home');
    }

	public function print_home(){
		if(Auth()->user()->role == "admin"){
            $tenaga_teknis = Tenaga_teknis::where('wilayah_id', Auth()->user()->user_wilayah->wilayah_id)->get();
        }
        else{
            $tenaga_teknis = Tenaga_teknis::all();
        }
        
		$data_tenaga_teknis = array();
		$i = 0;
		foreach($tenaga_teknis as $data){
			$data_tenaga_teknis[$i]['id'] = $data->id;
			$data_tenaga_teknis[$i]['nama'] = $data->nama;
			$data_tenaga_teknis[$i]['no_registrasi'] = $data->no_registrasi;
			$data_tenaga_teknis[$i]['wilayah'] = $data->wilayah->wilayah;
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
        return view('home.print_home', compact('data_tenaga_teknis'));
	}

	public function home_periode(){
		$periode = Periode::all();
		return view('home.periode', compact('periode'));
	}
    
}
