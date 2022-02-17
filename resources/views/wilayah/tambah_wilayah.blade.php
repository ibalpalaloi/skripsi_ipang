@extends('layout.layout')
@section('title')
Data Wilayah
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

    <form action="/post-wilayah" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Wilayah</label>
          <input type="text" class="form-control" name="wilayah">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@section('footer')
@endsection