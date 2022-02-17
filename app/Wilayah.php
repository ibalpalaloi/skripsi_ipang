<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    //
    protected $table = 'wilayah';
    public function tenaga_teknis(){
        return $this->hasMany(Tenaga_teknis::class);
    }
}
