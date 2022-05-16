@extends('layout.layout')
@section('title')
Tambah Periode
@endsection
@section('body')
<form action="/periode/create" method="POST">
    {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Periode</label>
            <input name="periode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Periode">
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection