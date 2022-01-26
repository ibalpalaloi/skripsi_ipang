@extends('layout.layout')
@section('title')
Tambah Data Tenaga Teknis
@endsection
@section('body')
<form action="/produk/create" method="POST">
              {{csrf_field()}}
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
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Tenaga Teknis</label>
              <input name="produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
              @if($errors->has('produk'))
                  <span class="help-block">{{$errors->first('produk')}}</span>
              @endif
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nomor Register</label>
              <input name="produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Register"></div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
@endsection