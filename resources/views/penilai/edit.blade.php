@extends('layout.layout')
@section('body')
<div class="modal-body">
          <form action="/penilai/ubah/{{$data_penilai->id}}" method="POST">
              {{csrf_field()}}
              <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$data_penilai -> nama}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Wilayah Kerja</label>
              <select name="skpd" class="form-control" id="skpd">
                <option value="{{$data_penilai->skpd_id}}">{{$data_penilai->skpd->skpd}}</option>
                @foreach($data_skpd as $data)
                  <option value="{{$data->id}}">{{$data->skpd}}</option>
                @endforeach
              </select>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
        </div>
@endsection
@section('footer')
<script type="text/javascript">
  $( function() {
    $( "#tanggal" ).datepicker({
      'format' : 'dd-mm-yyyy',
      'autoclose' : true
    });
  } );
</script>
@endsection