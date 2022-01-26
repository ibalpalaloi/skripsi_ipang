<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    protected $table = 'skpd';
    protected $fillable = ['id_skpd','kelompok_instansi','provinsi','kabupaten_kota','skpd','alamat','telepon_fax'];

    public function produk(){
    	return $this->hasMany(Produk::class);
    }
}
