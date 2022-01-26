@extends('layout.layout')
@section('title')
Form Penilaian
@endsection
@section('body')
<div class="container-fluid">
<div class="form-group">
  <form action="/nilai" method="post">
    {{ csrf_field() }}
              <label for="exampleFormControlSelect1">Wilayah Kerja</label>
              <select name="skpd" class="form-control" id="skpd">
                <option></option>
                @foreach($data_skpd as $skpd)
                  <option value="{{$skpd->id}}">{{$skpd->skpd}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tenaga Teknis</label>
              <select name="produk" class="form-control" id="produk">
              </select>
              @if($errors->has('produk'))
                  <span class="help-block">{{$errors->first('produk')}}</span>
              @endif
            </div>

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
      <tr>
        <td>1</td>
        <td>Memahami dan menguasai peraturan bidang pengelolaan hutan Produksi lestari</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Memahami dan menguasai peraturan sesuai dengan tugas dan kewenangannya</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>3</td>
        <td>Keterampilan dan ketepatan menggunakan sarana kerja</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>4</td>
        <td>Membuat dan menyampaikan laporan kegiatan bulanan</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>5</td>
        <td>Kesesuaian/kelengkapan laporan bulanan dengan format standar</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>6</td>
        <td>Mengikuti pendidikan dan pelatihan di bidang pengelolaan hutan produksi lainnya</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>7</td>
        <td>Mengikuti seminar/sosialisasi/pembahasan bidang pengelolaan hutan produksi lestari</td>
        <td>
          <select>
          <option>sangat baik</option>
          <option>baik</option>
          <option>cukup baik</option>
          <option>kurang baik</option>
          <option>tidak baik</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Pelanggaran administrasi terkait tugas dan kewenangannya</td>
        <td>
          <select>
          <option>Tidak pernah melakukan pelanggaran administrasi</option>
          <option>Pernah melakukan pelanggaran administrasi</option>
          <option>Masih dalam pembekuan kartu</option>
          </select>
        </td>
      </tr>
      </tbody>
</table>
<div class="row">
  <div class="col-sm"></div>
  <div class="col-sm"></div>
  <div class="col-sm"></div>
  <div class="col-sm"></div>
  <div class="col-sm">
    <button type="submit" class="btn btn-primary">Nilai</button>
    </form>
  </div>
</div>
@endsection
@section('footer')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#skpd').change(function(){
      if($(this).val() != ' ')
      {
        var id = $(this).val();
        var _token = $('input[name="_token"]').val();
        
        $.ajax({
          
          url:"{{ route('get.produk.penilaian') }}",
          method: "post",
          data : {id:id, _token:_token},
          success:function(result)
          {
            $("#produk").html(result);
            
          }
        })
      }
    });
    })
  </script>
@endsection