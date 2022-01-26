@extends('layout.layout')
@section('title')
Hasil Penilaian Tenaga Teknis (GANIS)
@endsection
@section('body')
<div class="container-fluid">
<div class="form-group">
<form action="/nilai" method="post">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="bg-light text-capitalize">
        <tr role="row">
              <th style="text-align: center;">No.</th>
              <th style="text-align: center;">Nama Tenaga Teknis</th>
              <th style="text-align: center;">Nomor Register</th>
              <th style="text-align: center;">Tahun Penilaian</th>
              <th style="text-align: center;">Nilai</th>
              <th style="text-align: center;">Rincian</th>
              
          </tr>
      </thead>
      <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($produk as $data)
        <tr>
            <td style="text-align: center;">{{$no++}}.</td>
            <td>{{$data->produk}}</td>
            <td style="text-align: center;">{{$data->updated_at}}</td>
            <td style="text-align: center;">{{$data->nilai}}</td>
          <td><a href="/layanan/{{$data->id}}/detail" type="submit" class="btn btn-primary" style="color: white">Nilai</a></td>
        </tr> 
        @endforeach
        <tr>
          <td colspan="3" style="text-align: center; font-weight: bold;">Rata-Rata</td>
          <td style="text-align: center; font-weight: bold;">{{$rata}}</td>
        </tr>
        <tr>
          <td style="font-weight: bold; text-align: center;" colspan="3">Tingkat Kepatuhan</td>
          <td style="font-weight: bold; text-align: center;">{{$hasil}}</td>
        </tr>
      </tbody>
</table>
</form>
@endsection