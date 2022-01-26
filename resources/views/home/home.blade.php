@extends('layout.layout')
@section('title')
Hasil Penilaian Kinerja Tenaga Teknis
@endsection
@section('body')
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<thead class="bg-light text-capitalize">
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">No.</th>
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Wilayah Kerja</th>
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px; text-align: center;">Nilai</th>
</tr>
</thead>
      <tbody>
         @php
            $no=0;
         @endphp
        @foreach ($skpd as $skpd)    
            <tr>
                <td style="text-align: center">{{$no+1}}.</td>
                <td>{{$skpd}}</td>
                <td style="text-align: center;">{{$nilai_skpd[$no]}}</td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
        <tr>
            <td style="font-weight: bold; text-align: center;" colspan="2">Nilai Rata-Rata</td>
            <td style="font-weight: bold; text-align: center;">{{$rata_rata}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; text-align: center;"  colspan="2">Tingkat Kepatuhan</td>
            @if ($rata_rata >= 0 and $rata_rata <=50)
                <td style="font-weight: bold; text-align: center;"> Rendah</td>    
            @endif
            @if ($rata_rata >= 51 and $rata_rata <=80)
                <td style="font-weight: bold; text-align: center;">Sedang</td>    
            @endif
            @if ($rata_rata >= 81 and $rata_rata <=100)
                <td style="font-weight: bold; text-align: center;">Tinggi</td>    
            @endif
        </tr>
        <tr>
            <td style="font-weight: bold; text-align: center;" colspan="2">Zona Kepatuhan</td>
            @if ($rata_rata >= 0 and $rata_rata <=50)
                <td style="background-color: red; font-weight: bold; text-align: center;"> Merah</td>    
            @endif
            @if ($rata_rata >= 51 and $rata_rata <=80)
                <td style="background-color: yellow; font-weight: bold; text-align: center;" >Kuning</td>    
            @endif
            @if ($rata_rata >= 81 and $rata_rata <=100)
                <td style="background-color: green; font-weight: bold; text-align: center;">Hijau</td>    
            @endif
        </tr>
      </tbody>
</table>
<div class="row">
  <div class="col-sm"></div>
  <div class="col-sm"></div>
  <div class="col-sm"></div>
  <div class="col-sm"></div>
  <div class="col-sm">
    <a href="home/exportskpd" type="submit" class="btn btn-primary btn-sm">Cetak</a>
</div>
</div>
@endsection