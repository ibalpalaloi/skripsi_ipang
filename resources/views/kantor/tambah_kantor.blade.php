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

    <form action="/post-kantor" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Kantor</label>
          <input type="text" class="form-control" name="kantor">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Wilayah</label>
            <select class="form-control" id="exampleFormControlSelect2" name="wilayah_id">
                <option value="">---</option>
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