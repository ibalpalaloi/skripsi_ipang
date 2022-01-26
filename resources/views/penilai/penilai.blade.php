@extends('layout.layout')
@section('title')
Data Identitas Pengambil Data
@endsection
@section('body')
<div class="container-fluid">
  <a href="/penilai/tambah" type="button" class="btn btn-primary btn-sm">
    + Tambah data penilai
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
                          <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">No. </th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 150px; text-align: center;">Nama</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 180px; text-align: center; ">Wilaya Kerja</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 100px; text-align: center;">Tanggal Observasi</th>
                           @if(auth()->user()->role == 'Admin')
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">Aksi</th>
                           @endif
                      </tr>
                      @php
                        $n = 1;
                      @endphp
                      @foreach($data_penilai as $penilai)
                      <tr>
                          <td style="text-align: center;">{{ $n++ }}.</td>
                          <td>{{$penilai->nama}}</td>
                          <td>{{$penilai->skpd->skpd}}</td>
                          <td style="text-align: center;">{{$penilai->created_at}}</td>
                          @if(auth()->user()->role == 'Admin')
                          <td><a href="/penilai/{{$penilai->id}}/edit"class="btn btn-success btn-xs mb-3">
                                  <i class="fas fa-pencil-alt"></i></a>
                              <a href="/penilai/{{$penilai->id}}/delete" class="btn btn-danger btn-xs mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                              </td>
                              @endif
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection
