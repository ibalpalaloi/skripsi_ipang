<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenaga_teknis;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
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
        return view('home.home', compact('data_tenaga_teknis'));
    	// return view('home.home');
    }

    
}
