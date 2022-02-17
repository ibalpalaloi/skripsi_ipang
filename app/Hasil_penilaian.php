<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil_penilaian extends Model
{
    //
    protected $table = "Hasil_penilaian";

    public function tenaga_teknis(){
        return $this->belongsTo(Tenaga_teknis::class);
    }
}
