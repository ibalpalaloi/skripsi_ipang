@extends('layout.layout')
@section('title')
Data Tenaga Teknis
@endsection
@section('body')
<div class="container-fluid">
    @if (session('Sukses'))
    <div class="alert alert-success" role="alert">
        {{session('Sukses')}}
    </div>
    @endif
    <a href="/print-tenaga-teknis-home" target="blank" class="btn btn-primary">Print</a>
    <br><br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 10 % ; text-align: center;">No</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Nama</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">No Registrasi</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Wilayah</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Nilai</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Rentang</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;"></th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tbody>
            @foreach($data_tenaga_teknis as $data)
            <tr>
                <td style="text-align: center;">{{$no++}}</td>
                <td style="text-align: center;">{{ $data['nama']}}</td>
                <td style="text-align: center;">{{ $data['no_registrasi']}}</td>
                <td style="text-align: center;">{{ $data['wilayah']}}</td>
                <td style="text-align: center;">{{ $data['nilai']}}</td>
                <td style="text-align: center;">{{ $data['rentang']}}</td>
                <td>
                    @if ($data['rentang'] != "-")
                        <a href="/penilaian-tenaga-teknis/detail-penilaian/{{$data['id']}}/{{$id}}" class="btn btn-primary">Detail</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
</script>
@endsection