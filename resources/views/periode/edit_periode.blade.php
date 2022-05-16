@extends('layout.layout')
@section('title')
Ubah Periode
@endsection
@section('body')
<form action="/periode/post-edit" method="POST">
    {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Periode</label>
            <input type="text" value="{{$periode->id}}" name="id" hidden>
            <input value="{{$periode->periode}}" name="periode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Periode">
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection