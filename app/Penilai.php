<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilai extends Model
{
    protected $table = 'penilai';
    protected $fillable = ['id_penilai','nama','id_skpd','skpd','tgl_obs'];

    public function skpd(){
    	return $this->belongsTo(Skpd::class);
    }
}
