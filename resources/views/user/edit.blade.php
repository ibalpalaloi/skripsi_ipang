@extends('layout.layout')
@section('title')
Ubah Data User
@endsection
@section('body')
<div class="container-fluid">
<form action="/user/{{$user->id}}/ubah" method="POST">
        {{csrf_field()}}
        <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value='{{$user->name}}'>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value='{{$user->username}}'>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Role</label>
        <select name="role" class="form-control" id="exampleFormControlSelect1">
        	<option value="{{$user->role}}">{{$user->role}}</option>
          <option value="Admin">Admin</option>
          <option value="Pegawai">Pegawai</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value='{{$user->password}}'>
      </div>
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Ubah</button>
</form>
</div>
@endsection