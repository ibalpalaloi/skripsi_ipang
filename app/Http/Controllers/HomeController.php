<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skpd;
use App\Produk;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
        $skpd = Skpd::all();
        $SKPD = array();
        $nilai_SKPD = array();
        foreach($skpd as $data){
            $bagi=0;
            $nilai = 0;
            foreach($data->produk as $produk){
                if(empty($produk->nilai)){
                    $nilai_produk = 0;
                }
                else{
                    $nilai_produk = $produk->nilai;
                }
                $nilai += $nilai_produk;
                $bagi++;
            }
            $nilai=$nilai/$bagi;
            array_push($SKPD, $data->skpd);
            array_push($nilai_SKPD, $nilai);
        }
        $nilai_total = 0;
        $pembagi = 0;
        foreach($nilai_SKPD as $data){
            $nilai_total += $data;
            $pembagi++;
        }
        $rata_rata = $nilai_total/$pembagi;
        $rata_rata = substr($rata_rata, 0,5);
    	return view('home.home', ['skpd'=>$SKPD, 'nilai_skpd'=>$nilai_SKPD, 'nilai_total'=>$nilai_total, 'rata_rata'=>$rata_rata]);
    }

    public function ExportSkpd()
    {
        $skpd = Skpd::all();
        $SKPD = array();
        $nilai_SKPD = array();
        foreach($skpd as $data){
            $bagi=0;
            $nilai = 0;
            foreach($data->produk as $produk){
                if(empty($produk->nilai)){
                    $nilai_produk = 0;
                }
                else{
                    $nilai_produk = $produk->nilai;
                }
                $nilai += $nilai_produk;
                $bagi++;
            }
            $nilai=$nilai/$bagi;
            array_push($SKPD, $data->skpd);
            array_push($nilai_SKPD, $nilai);
        }
        $nilai_total = 0;
        $pembagi = 0;
        foreach($nilai_SKPD as $data){
            $nilai_total += $data;
            $pembagi++;
        }
        $rata_rata = $nilai_total/$pembagi;
        $rata_rata = substr($rata_rata, 0,5);

       $pdf = PDF::loadView('home.cetak',['skpd'=>$SKPD, 'nilai_skpd'=>$nilai_SKPD, 'nilai_total'=>$nilai_total, 'rata_rata'=>$rata_rata]);
       return $pdf->download('Hasil Penilaian Kepatuhan Standar Pelayanan Publik.pdf');
    }
}
