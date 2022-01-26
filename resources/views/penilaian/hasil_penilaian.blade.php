@extends('layout.layout')
@section('title')
Hasil Penilaian
@endsection
@section('body')
<div class="container-fluid">

  <form action="/nilai" method="post">
    {{ csrf_field() }}
              <label for="exampleFormControlSelect1">Wilayah Kerja</label>
              <input type="text" class="form-control" value="{{$skpd->skpd}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tenaga Teknis</label>
              <input type="text" class="form-control" value="{{$produk->produk}}">
            </div>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <thead class="bg-light text-capitalize">
        <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">No.</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Variabel Penilaian</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 90px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Komponen Indikator</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Pilih Salah Satu</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Bobot</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Nilai Normalisasi</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Utility</th>
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Kriteria: activate to sort column descending">Normalisasi * Utility</th>
          </tr>
      </thead>
      <tbody>
      <tr>
        <td rowspan="5">
          1.
        </td>
        <td rowspan = "5">Standar Pelayanan Publik</td>
        <td>1) Persyaratan</td>
        <td>{{$parameter_k[0]}}
        </td>
        <td>{{$kriteria[0]->bobot}}</td>
        <td>{{$nilai_normalisasi[0]}}</td>
        <td>{{$nilai_utility[0]}}</td>
        <td>{{$nilai_normalisasi[0] * $nilai_utility[0]}}</td>
      </tr>
      <tr>
        <td>2) Sistem, Mekanisme, dan Prosedur</td>
        <td>{{$parameter_k[1]}}
        </td>
        <td>{{$kriteria[1]->bobot}}</td>
        <td>{{$nilai_normalisasi[1]}}</td>
        <td>{{$nilai_utility[1]}}</td>
        <td>{{$nilai_normalisasi[1] * $nilai_utility[1]}}</td>
      </tr>
      <tr>
        <td>3) Biaya/Tarif</td>
        <td>{{$parameter_k[2]}}
        </td>
        <td>{{$kriteria[2]->bobot}}</td>
        <td>{{$nilai_normalisasi[2]}}</td>
        <td>{{$nilai_utility[2]}}</td>
        <td>{{$nilai_normalisasi[2] * $nilai_utility[2]}}</td>
      </tr>
      <tr>
        <td>4) Jangka Waktu Penyelesaian</td>
        <td>{{$parameter_k[3]}}
        </td>
        <td>{{$kriteria[3]->bobot}}</td>
        <td>{{$nilai_normalisasi[3]}}</td>
        <td>{{$nilai_utility[3]}}</td>
        <td>{{$nilai_normalisasi[3] * $nilai_utility[3]}}</td>
      </tr>
      <tr>
        <td>5) Produk Pelayanan</td>
        <td>{{$parameter_k[4]}}
        </td>
        <td>{{$kriteria[4]->bobot}}</td>
        <td>{{$nilai_normalisasi[4]}}</td>
        <td>{{$nilai_utility[4]}}</td>
        <td>{{$nilai_normalisasi[4] * $nilai_utility[4]}}</td>
      </tr>
      <tr>
        <td>
          2.
        </td>
        <td>Maklumat Layanan</td>
        <td>Ketersediaan Maklumat Layanan</td>
        <td>{{$parameter_k[5]}}
        </td>
        <td>{{$kriteria[5]->bobot}}</td>
        <td>{{$nilai_normalisasi[5]}}</td>
        <td>{{$nilai_utility[5]}}</td>
        <td>{{$nilai_normalisasi[5] * $nilai_utility[5]}}</td>
      </tr>
      <tr>
        <td rowspan="2">
          3.
        </td>
        <td rowspan="2">Sistem informasi Pelayanan Publik
        *khusus nomor ini lingkari salah satu
      jawaban disamping</td>
        <td>1) Ketersediaan Informasi Pelayanan Publik Eleketronik</td>
        <td>{{$parameter_k[6]}}
        </td>
        <td>{{$kriteria[6]->bobot}}</td>
        <td>{{$nilai_normalisasi[6]}}</td>
        <td>{{$nilai_utility[6]}}</td>
        <td>{{$nilai_normalisasi[6] * $nilai_utility[6]}}</td>
      </tr>
      <tr>
        <td>2) Ketersediaan Informasi Pelayanan Publik Non-Eleketronik</td>
        <td>{{$parameter_k[7]}}
        </td>
        <td>{{$kriteria[7]->bobot}}</td>
        <td>{{$nilai_normalisasi[7]}}</td>
        <td>{{$nilai_utility[7]}}</td>
        <td>{{$nilai_normalisasi[7] * $nilai_utility[7]}}</td>
      </tr>
      <tr>
        <td rowspan="3">
          4.
        </td>
        <td rowspan = "3">Sarana dan prasana, Fasilitas</td>
        <td>1) Ketersediaan Ruang Tunggu</td>
        <td>{{$parameter_k[8]}}
        </td>
        <td>{{$kriteria[8]->bobot}}</td>
        <td>{{$nilai_normalisasi[8]}}</td>
        <td>{{$nilai_utility[8]}}</td>
        <td>{{$nilai_normalisasi[8] * $nilai_utility[8]}}</td>
      </tr>
      <tr>
        <td>2) Ketersediaan Toilet Untuk Pengguna Layanan</td>
        <td>{{$parameter_k[9]}}
        </td>
        <td>{{$kriteria[9]->bobot}}</td>
        <td>{{$nilai_normalisasi[9]}}</td>
        <td>{{$nilai_utility[9]}}</td>
        <td>{{$nilai_normalisasi[9] * $nilai_utility[9]}}</td>
      </tr>
      <tr>
        <td>3) Ketersediaan Loket/Meja Pelayanan</td>
        <td>{{$parameter_k[10]}}
        </td>
        <td>{{$kriteria[10]->bobot}}</td>
        <td>{{$nilai_normalisasi[10]}}</td>
        <td>{{$nilai_utility[10]}}</td>
        <td>{{$nilai_normalisasi[10] * $nilai_utility[10]}}</td>
      </tr>
      <tr>
        <td rowspan="2">
          5.
        </td>
        <td rowspan = "2">Pelayanan Khusus</td>
        <td>1) Ketersediaan Sarana/Prasarana Khusus Bagi Pengguna Layanan Berkebutuhan Khusus(Ram/Rambatan/Kursi Roda/Jalur Pemandu/Toilet Khusus/Ruang Meyusui/Dll)</td>
        <td>{{$parameter_k[11]}}
        </td>
        <td>{{$kriteria[11]->bobot}}</td>
        <td>{{$nilai_normalisasi[11]}}</td>
        <td>{{$nilai_utility[11]}}</td>
        <td>{{$nilai_normalisasi[11] * $nilai_utility[11]}}</td>
      </tr>
      <tr>
        <td>2) Ketersediaan Pelayanan Khusus Bagi Pengguna Layanan Berkebutuhan Khusus</td>
        <td>{{$parameter_k[12]}}
        </td>
        <td>{{$kriteria[12]->bobot}}</td>
        <td>{{$nilai_normalisasi[12]}}</td>
        <td>{{$nilai_utility[12]}}</td>
        <td>{{$nilai_normalisasi[12] * $nilai_utility[12]}}</td>
      </tr>
      <tr>
        <td rowspan="3">
          6.
        </td>
        <td rowspan = "3">Pengelolaan Pengaduan</td>
        <td>1) Ketersediaan Sarana Pengaduan (SMS/Telepon/FAX/Email/Dll)</td>
        <td>{{$parameter_k[13]}}
        </td>
        <td>{{$kriteria[13]->bobot}}</td>
        <td>{{$nilai_normalisasi[13]}}</td>
        <td>{{$nilai_utility[13]}}</td>
        <td>{{$nilai_normalisasi[13] * $nilai_utility[13]}}</td>
      </tr>
      <tr>
        <td>2) Ketersediaan Informasi Prosedur Penyampaian Pengaduan</td>
        <td>{{$parameter_k[14]}}
        </td>
        <td>{{$kriteria[14]->bobot}}</td>
        <td>{{$nilai_normalisasi[14]}}</td>
        <td>{{$nilai_utility[14]}}</td>
        <td>{{$nilai_normalisasi[14] * $nilai_utility[14]}}</td>
      </tr>
      <tr>
        <td>3) Ketersediaan Pejabat/Petugas Pengelola Pengaduan</td>
        <td>{{$parameter_k[15]}}
        </td>
        <td>{{$kriteria[15]->bobot}}</td>
        <td>{{$nilai_normalisasi[15]}}</td>
        <td>{{$nilai_utility[15]}}</td>
        <td>{{$nilai_normalisasi[15] * $nilai_utility[15]}}</td>
      </tr>
      <tr>
        <td>
          7.
        </td>
        <td>Pelayanan Kinerja</td>
        <td>Ketersediaan Sarana Pengukuran Kepuasan Pelanggan</td>
        <td>{{$parameter_k[16]}}
        </td>
        <td>{{$kriteria[16]->bobot}}</td>
        <td>{{$nilai_normalisasi[16]}}</td>
        <td>{{$nilai_utility[16]}}</td>
        <td>{{$nilai_normalisasi[16] * $nilai_utility[16]}}</td>
      </tr>
      <tr>
        <td rowspan="2">
          8.
        </td>
        <td rowspan = "2">Visi, Misi, dan Moto Pelayanan</td>
        <td>1) Ketersediaan Moto Pelayanan</td>
        <td>{{$parameter_k[17]}}
        </td>
        <td>{{$kriteria[17]->bobot}}</td>
        <td>{{$nilai_normalisasi[17]}}</td>
        <td>{{$nilai_utility[17]}}</td>
        <td>{{$nilai_normalisasi[17] * $nilai_utility[17]}}</td>
      </tr>
      <tr>
        <td>2) Ketersediaan Visi dan Misi Pelayanan</td>
        <td>{{$parameter_k[18]}}
        </td>
        <td>{{$kriteria[18]->bobot}}</td>
        <td>{{$nilai_normalisasi[18]}}</td>
        <td>{{$nilai_utility[18]}}</td>
        <td>{{$nilai_normalisasi[18] * $nilai_utility[18]}}</td>
      </tr>
      <tr>
        <td>
          9.
        </td>
        <td>Atribut</td>
        <td>Ketersediaan Petugas Penyelenggara Menggunakan ID Card</td>
        <td>{{$parameter_k[19]}}
        </td>
        <td>{{$kriteria[19]->bobot}}</td>
        <td>{{$nilai_normalisasi[19]}}</td>
        <td>{{$nilai_utility[19]}}</td>
        <td>{{$nilai_normalisasi[19] * $nilai_utility[19]}}</td>
      </tr>
      <tr>
          <td style="font-weight: bold; text-align: center" colspan="7">Jumlah</td>
          <td style="font-weight: bold;">{{$nilai_akhir}}</td>
      </tr>
      </tbody>
</table>

</form>
@endsection