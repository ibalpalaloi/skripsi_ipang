<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    //
    protected $table = 'kantor';

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }

    public function tenaga_teknis(){
        return $this->hasMany(Tenaga_teknis::class);
    }
}
