<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['id_produk','id_skpd','skpd','produk'];

    public function skpd(){
    	return $this->belongsTo(Skpd::class);
    }
}
