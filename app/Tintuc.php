<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    //
     protected $table = "tintuc";

     public function loaitin(){

     	return $this->belongsTo('App\Loaitin', 'id_loaitin', 'id');
     }

     public function comment(){

     	return $this->hasMany('App\Comment','id_tintuc','id');
     }
}
