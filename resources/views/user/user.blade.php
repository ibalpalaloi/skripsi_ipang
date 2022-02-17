@extends('layout.layout')
@section('title')
Data User
@endsection
@section('body')
<div class="container-fluid">
    <a href="/user/tambah" type="button" class="btn btn-primary btn-sm">
      + Tambah data User
    </a>
  <br>
  <br>
  @if (session('Sukses'))
  <div class="alert alert-success" role="alert">
            {{session('Sukses')}}
          </div>
          @endif
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <thead class="bg-light text-capitalize">
                      <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">No.</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Nama</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Username</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px; text-align: center;">Role</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px; text-align: center;">Wilayah</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Tanggal Pembuatan</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 150px; text-align: center;">Aksi</th>
                      </tr>
                      @php
                        $n = 1;
                      @endphp
                      @foreach($data_user as $user)
                      <tr>
                          <td style="text-align: center;">{{ $n++ }}.</td>
                          <td>{{$user->name}}</td>
                          <td style="text-align: center;">{{$user->username}}</td>
                          <td style="text-align: center;">{{$user->role}}</td>
                          <td style="text-align: center;">{{$user->user_wilayah->wilayah->wilayah}}</td>
                          <td style="text-align: center;">{{$user->created_at}}</td>
                          <td>
                            {{-- <a href="/user/{{$user->id}}/edit"class="btn btn-success btn-xs mb-3">
                                  <i class="fas fa-pencil-alt"></i></a> --}}
                              <a href="/user/{{$user->id}}/delete" class="btn btn-danger btn-xs mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                      <i class="fa fa-trash"></i></a>
                              </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection