@extends('layout.layout')
@section('title')
Form Penilaian
@endsection
@section('body')
<div class="container-fluid">
  <form action="/post_penilaian/{{$id}}" method="post">
    @csrf
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <thead class="bg-light text-capitalize">
              <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px; text-align: center;">No.</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px; text-align: center;">Variabel Penilaian</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px; text-align: center;">Pilih Salah Satu</th>
                </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
            @foreach ($variabel_penilaian as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->variabel}}</td>
                  <td>
                    <select name="variabel_{{$data->id}}" id="">
                      <option value="0">Tidak Baik</option>
                      <option value="1">Kurang Baik</option>
                      <option value="2">Cukup Baik</option>
                      <option value="3">Baik</option>
                      <option value="4">Sangat Baik</option>
                    </select>
                  </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <div class="col">
          <button style="width: 100%; font-size: 16px" type="submit" class="btn btn-primary">Nilai</button>
        </div>
  </form>
  
  
</div>
@endsection
@section('footer')
@endsection