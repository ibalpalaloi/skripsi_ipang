@extends('layout.layout')
@section('title')
Hasil Penilaian
@endsection
@section('body')
<div class="container-fluid">
<div class="form-group">
  <form method="post">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="bg-light text-capitalize">
        <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="text-align: center;">No.</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="text-align: center;">Nama Wilayah Kerja</th>
              <th style="text-align: center;">Aksi</th>
          </tr>
      </thead>
      <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($skpd as $data)
        <tr>
            <td style="text-align: center;">{{$no++}}</td>
            <td>{{$data->skpd}}</td>
            <td><a href="/layanan/{{$data->id}}" type="submit" class="btn btn-primary" style="align-content: center;">Data Tenaga Teknis</a></td>
          </tr>
        @endforeach
      </tbody>
</table>
</form>
@endsection