<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    public function variabel_penilaian(){
        return $this->belongsTo(Variabel_penilaian::class);
    }
}
