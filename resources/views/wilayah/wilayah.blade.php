@extends('layout.layout')
@section('title')
Data Wilayah
@endsection
@section('body')

<div class="container-fluid">
    <a href="/tambah-wilayah" type="button" class="btn btn-primary">
        Tambah Wilayah
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
                             <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;">Wilayah</th>
                             <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: ; text-align: center;"></th>
                        </tr>
                    </thead>
                        @php
                        $n = 1;
                      @endphp
                    <tbody>
                        @foreach($wilayah as $data)
                        <tr>
                            <td style="text-align: center;">{{ $n++ }}.</td>
                            <td style="text-align: center;">{{$data->wilayah}}</td>
                            <td>
                                <a href="/hapus-wilayah/{{$data->id}}" type="button" class="btn btn-danger">Hapus</a>
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
@section('footer')
<script>
    function modal_tambah(){
        $('#exampleModal').modal('show');
    }
</script>
@endsection