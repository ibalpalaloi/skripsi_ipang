@extends('layout.layout')
@section('title')
Variabel Penilaian
@endsection
@section('body')
<div class="container-fluid">
    <a href="/tambah-variabel-penilaian" type="button" class="btn btn-primary btn-sm">
      + Tambah Variabel Penilaian
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
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 10%; text-align: center;">No.</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Variabel</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Bobot</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;"></th>

                        </tr>
                    </thead>
                        @php
                        $n = 1;
                      @endphp
                    <tbody>
                        @foreach($variabel as $data)
                        <tr>
                            <td style="text-align: center;">{{ $n++ }}.</td>
                            <td style="text-align: center;">{{$data->variabel}}</td>
                            <td style="text-align: center;">{{ $data->bobot }}.</td>
                            <td>
                                <a href="/ubah-variabel-penilaian/{{$data->id}}" type="button" class="btn btn-success">Ubah</a>
                                <a href="/hapus-variabel-penilaian/{{$data->id}}" type="button" class="btn btn-danger">Hapus</a>
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