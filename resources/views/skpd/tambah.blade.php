@extends('layout.layout')
@section('title')
Tambah Data Wilayah
@endsection
@section('body')
<form action="/skpd/create" method="POST">
                {{csrf_field()}}
              <div class="form-group">
                <label for="exampleInputEmail1">Provinsi</label>
                <input name="provinsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Provinsi" value="{{old('provinsi')}}">
                @if($errors->has('provinsi'))
                  <span class="help-block">{{$errors->first('provinsi')}}</span>
              @endif
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kabupaten/Kota</label>
                <input name="kabupaten_kota" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kabupaten/Kota" value="{{old('kabupaten_kota')}}">
                @if($errors->has('kabupaten_kota'))
                  <span class="help-block">{{$errors->first('kabupaten_kota')}}</span>
              @endif
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Wilayah Kerja</label>
                <input name="skpd" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="SKPD" value="{{old('skpd')}}">
                @if($errors->has('skpd'))
                  <span class="help-block">{{$errors->first('skpd')}}</span>
              @endif
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
@endsection