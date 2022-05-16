@extends('layout.layout')
@section('title')
Data User
@endsection
@section('body')
<div class="container-fluid">
    <a href="/periode/tambah" type="button" class="btn btn-primary btn-sm">
      + Tambah data User
    </a>
  <br>
  <br>
  @if (session('success'))
  <div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>
    @endif
  @if (session('error'))
  <div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>
     @endif
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <thead class="bg-light text-capitalize">
                      <tr role="row">
                          <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">No.</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="; text-align: center;">Periode</th>
                           <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style=" text-align: center; width: 60px"></th>
                      </tr>
                      @php
                        $n = 1;
                      @endphp
                      @foreach($periode as $data)
                      <tr>
                          <td style="text-align: center;">{{ $n++ }}.</td>
                          <td style=" text-align: center;">{{$data->periode}}</td>
                          <td>
                            <a href="/periode/edit/{{$data->id}}" class="btn btn-warning">Edit</a>
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