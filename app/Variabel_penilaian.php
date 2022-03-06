<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variabel_penilaian extends Model
{
    //
    protected $table = "variabel_penilaian";

    public function parameter_penilaian(){
        return $this->hasMany(Parameter_penilaian::class);
    }
}
