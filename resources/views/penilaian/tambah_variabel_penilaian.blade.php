@extends('layout.layout')
@section('title')
Tambah Variabel Penilaian
@endsection
@section('body')

<div class="container-fluid">
    <br>
    <br>
    @if (session('Sukses'))
    <div class="alert alert-success" role="alert">
        {{session('Sukses')}}
    </div>
    @endif

    <form action="/post-variabel-penilaian" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Variabel Penilaian</label>
          <input type="text" class="form-control" name="variabel_penilaian">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bobot</label>
            <input type="" class="form-control" name="bobot">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@section('footer')
@endsection