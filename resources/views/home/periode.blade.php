@extends('layout.layout')
@section('title')
Periode
@endsection
@section('body')
<div class="container-fluid">
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
                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 10 % ; text-align: center;">No</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 70% ; text-align: center;">Periode</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;"></th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tbody>
            @foreach($periode as $data)
            <tr>
                <td style="text-align: center;">{{$no++}}</td>
                <td style="text-align: center;">{{ $data->periode}}</td>
                <td>
                    <a href="/home/tenaga-teknis/{{$data->id}}" type="button" class="btn btn-danger">Tenaga Teknis</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection