@extends('layout.layout')
@section('title')
Ubah Parameter Penilaian
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

    <form action="/post-ubah-parameter-penilaian/{{$id}}" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Parameter Penilaian</label>
          <input type="text" class="form-control" name="parameter_penilaian" value="{{$parameter->parameter}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nilai</label>
            <input type="" class="form-control" name="nilai" value="{{$parameter->nilai}}">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@section('footer')
@endsection