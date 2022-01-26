@extends('layout.layout')
@section('title')
Ubah Data Wilayah
@endsection
@section('body')
<div class="container-fluid">
<form action="/skpd/ubah/{{$skpd->id}}" method="POST">
        {{csrf_field()}}
      <div class="form-group">
        <label for="exampleInputEmail1">Provinsi</label>
        <input name="provinsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Provinsi" value='{{$skpd->provinsi}}'>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Kabupaten/Kota</label>
        <input name="kabupaten_kota" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kabupaten/Kota" value='{{$skpd->kabupaten_kota}}'>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Wilayah Kerja</label>
        <input name="skpd" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kabupaten/Kota" value='{{$skpd->skpd}}'>
      </div>
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Ubah</button>
</form>
</div>
@endsection