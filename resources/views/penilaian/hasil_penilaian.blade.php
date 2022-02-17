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
          @foreach ($data_variabel_penilaian as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$data['variabel']}}</td>
                <td>{{$data['bobot']}}</td>
                <td>{{$data['nilai_normalisasi']}}</td>
                <td>{{$data['nilai_utility']}}</td>
                <td>{{$data['nilai_normalisasi'] * $data['nilai_utility']}}</td>
              </tr>
          @endforeach
          <tr>
            <td colspan="5">Nilai</td>
            <td>{{$nilai_akhir}}</td>
            
          </tr>
          <tr>
            <td colspan="5">Hasil</td>
            <td><b>{{$hasil_rentang_nilai}}</b></td>
          </tr>
        </tbody>
  </table>

</div>
@endsection