@extends('layout.layout')
@section('title')
Tambah Data User
@endsection
@section('body')
<form action="/user/create" method="POST">
{{csrf_field()}}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group {{$errors->has('skpd') ? 'has-error' : ''}}">
                <label for="exampleFormControlSelect1">Role</label>
                <select name="role" class="form-control" id="exampleFormControlSelect1">
                  <option value="admin">Admin</option>
                  <option value="superadmin">Super admin</option>
                </select>
            </div>
            <div class="form-group {{$errors->has('skpd') ? 'has-error' : ''}}">
              <label for="exampleFormControlSelect1">Role</label>
              <select name="wilayah" class="form-control" id="exampleFormControlSelect1">
                @foreach ($wilayah as $data)
                  <option value="{{$data->id}}">{{$data->wilayah}}</option>
                @endforeach
              </select>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
@endsection