<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_wilayah extends Model
{
    use HasFactory;
    protected $table = 'user_wilayah';

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
