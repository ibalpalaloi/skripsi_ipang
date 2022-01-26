@extends('layout.layout')
@section('title')
Tambah Data Penilai
@endsection
@section('body')
<form action="/penilai/create" method="POST">
              {{csrf_field()}}
            <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
              <label for="exampleInputEmail1">Nama</label>
              <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{old('nama')}}">
              @if($errors->has('nama'))
                  <span class="help-block">{{$errors->first('nama')}}</span>
              @endif
            </div>
            <div class="form-group {{$errors->has('skpd') ? 'has-error' : ''}}">
              <label for="exampleFormControlSelect1">Wilayah Kerja</label>
              <select name="skpd" class="form-control" id="exampleFormControlSelect1">
                <option></option>
                @foreach($data_skpd as $data)
                  <option value="{{$data->id}}">{{$data->skpd}}</option>
                @endforeach
              </select>
              @if($errors->has('skpd'))
                  <span class="help-block">{{$errors->first('skpd')}}</span>
              @endif
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
        </div>
@endsection