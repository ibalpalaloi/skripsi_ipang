@extends('layout.layout')
@section('title')
Hasil Penilaian
@endsection
@section('body')
<div class="container-fluid">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
          <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">No.</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Variabel Penilaian</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Bobot</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Nilai Normalisasi</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Utility</th>
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Normalisasi * Utility</th>
            </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($penilaian as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$data->variabel_penilaian->variabel}}</td>
                <td>{{$data->variabel_penilaian->bobot}}</td>
                <td>{{$data->nilai_normalisasi}}</td>
                <td>{{$data->utility}}</td>
                <td>{{$data->nilai_normalisasi * $data->utility}}</td>
              </tr>
          @endforeach
          <tr>
            <td colspan="5">Nilai</td>
            <td>{{$hasil_penilaian->nilai}}</td>
            
          </tr>
          <tr>
            <td colspan="5">Hasil</td>
            @if ($hasil_penilaian->nilai >= 0 && $hasil_penilaian->nilai <=50)
                <td><b>Rendah</b></td>
            @endif
            @if ($hasil_penilaian->nilai >= 51 && $hasil_penilaian->nilai <=80)
                <td><b>Sedang</b></td>
            @endif
            @if ($hasil_penilaian->nilai >= 80)
                <td><b>Tinggi</b></td>
            @endif
            
          </tr>
        </tbody>
  </table>
  <div>
    <a href="/penilaian/tenaga-teknis/{{$id_wilayah}}/{{$id_periode}}" class="btn btn-primary">Kembali</a>
  </div>

</div>
@endsection