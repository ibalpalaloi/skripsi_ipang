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

    <form action="/post-tenaga-teknis" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">No Registrasi</label>
            <input type="text" class="form-control" name="no_registrasi">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Perusahaan</label>
            <input type="text" class="form-control" name="perusahaan">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Wilayah</label>
            <select class="form-control" id="exampleFormControlSelect1" name="wilayah_id">
              <option>----</option>
                @foreach ($wilayah as $data)
                    <option value="{{$data->id}}">{{$data->wilayah}}</option>
                @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@section('footer')
@endsection