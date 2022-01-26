@extends('layout.layout')
@section('body')
<div class="modal-body">
          <form action="/produk/ubah/{{$data_produk -> id}}" method="POST">
              {{csrf_field()}}
            <div class="form-group">
              <label for="exampleFormControlSelect1">SKPD</label>
              <select name="skpd" class="form-control" id="exampleFormControlSelect1">
                <option value="{{$data_produk->skpd_id}}">{{$data_produk->skpd->skpd}}</option>
                @foreach($data_skpd as $data)
                  <option value="{{$data->id}}">{{$data->skpd}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Produk</label>
              <input name="produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Produk" value="{{$data_produk -> produk}}">
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
        </div>
@endsection