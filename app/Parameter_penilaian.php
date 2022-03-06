<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter_penilaian extends Model
{
    use HasFactory;

    protected $table = "parameter_penilaian";

    public function variabel_panilaian(){
        return $this->belongsTo(Variabel_penilaian::class);
    }
}
