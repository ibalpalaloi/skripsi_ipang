<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenaga_teknis extends Model
{
    //
    protected $table = 'tenaga_teknis';

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }

    public function hasil_penilaian(){
        return $this->hasOne(Hasil_penilaian::class);
    }
}
