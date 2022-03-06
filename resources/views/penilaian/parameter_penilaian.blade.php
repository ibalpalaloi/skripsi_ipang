@extends('layout.layout')
@section('title')
Parameter Penilaian
@endsection
@section('body')
<div class="container-fluid">
    <a href="/tambah-parameter-penilaian/{{$id}}" type="button" class="btn btn-primary btn-sm">
      + Tambah Parameter Penilaian
    </a>
    <br>
    <br>
    @if (session('Sukses'))
    <div class="alert alert-success" role="alert">
              {{session('Sukses')}}
            </div>
            
            @endif
            <p>Variabel Penilaian : <b>{{$variabel_penilaian->variabel}}</b></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 10%; text-align: center;">No.</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Parameter</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Nilai</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;"></th>

                    </thead>
                        @php
                        $n = 1;
                      @endphp
                    <tbody>
                        @foreach($parameter as $data)
                        <tr>
                            <td style="text-align: center;">{{ $n++ }}.</td>
                            <td style="text-align: center;">{{$data->parameter}}</td>
                            <td style="text-align: center;">{{ $data->nilai }}.</td>
                            <td>
                                <a href="/ubah-parameter-penilaian/{{$data->id}}" type="button" class="btn btn-success">Ubah</a>
                                <a href="/hapus-parameter-penilaian/{{$data->id}}" type="button" class="btn btn-danger">Hapus</a>
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