@extends('layout.layout')
@section('title')
Data Wilayah
@endsection
@section('body')
<div class="container-fluid">
    <a href="/skpd/tambah" type="button" class="btn btn-primary btn-sm">
      + Tambah data Wilayah
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
                              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 30px; text-align: center;">No.</th>
                             <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Provinsi</th>
                             <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">Kabupaten/Kota</th>
                             <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px; text-align: center;">Wilayah Kerja</th>
                             @if(auth()->user()->role == 'Admin')
                             <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Aksi</th>
                             @endif
                        </tr>
                        @php
                        $n = 1;
                      @endphp
                        @foreach($data_skpd as $skpd)
                        <tr>
                            <td style="text-align: center;">{{ $n++ }}.</td>
                            <td style="text-align: center;">{{$skpd->provinsi}}</td>
                            <td style="text-align: center;">{{$skpd->kabupaten_kota}}</td>
                            <td style="text-align: center;">{{$skpd->skpd}}</td>
                            @if(auth()->user()->role == 'Admin')
                            <td><a href="/skpd/{{$skpd->id}}/edit" class="btn btn-success btn-xs mb-3"><i class="fas fa-pencil-alt"></i></a>
                                <a href="/skpd/{{$skpd->id}}/delete" class="btn btn-danger btn-xs mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"> <i class="fa fa-trash"></i></a>
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