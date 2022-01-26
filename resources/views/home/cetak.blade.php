<DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <style>
  	table.static {
  		position: relative;
  		border: 1px solid #543535;
  	}
  </style>
</head>
<body>
<div class="form-group">
<p align="justify"><b>Nilai Kepatuhan Pemerintah Pusat dan Pemerintah Daerah Terhadap Standar Pelayanan Publik Sesuai Undang-Undang Nomor 25 Tahun 2009 Tentang Pelayanan Publik</b></p>
<p align="justify">Kategorisasi : Pemerintah Daerah</p>
<p align="justify">Pemerintah Daerah : Kota Palu</p>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
<thead class="bg-light text-capitalize">
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">No.</th>
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Nama Unit Layanan</th>
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
<br>
<br>
<br>
<br>
<br>
<br>
<p align="justify">Keterangan Kategorisasi Penilaian Pemerintah Daerah :</p>
<table class="table table-bordered" id="dataTable" width="40%" cellspacing="0" border="1">
<thead class="bg-light text-capitalize">
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center; font-size: 10; font-weight: bold;">Nilai</th>
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 80px; text-align: center; font-size: 10; font-weight: bold;">Tingkat Kepatuhan</th>
<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center; font-size: 10; font-weight: bold;">Zona</th>
</tr>
</thead>
<tbody>
<tr>
  <td style="text-align: center">0-50</td>
  <td style="text-align: center">Rendah</td>
  <td style="text-align: center; background-color: red;">Merah</td>
</tr>
<tr>
  <td style="text-align: center">51-80</td>
  <td style="text-align: center">Sedang</td>
  <td style="text-align: center; background-color: yellow;">Kuning</td>
</tr>
<tr>
  <td style="text-align: center">81-100</td>
  <td style="text-align: center">Tinggi</td>
  <td style="text-align: center; background-color: green;">Hijau</td>
</tr>
</tbody>
</div>
</body>