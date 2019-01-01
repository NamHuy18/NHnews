<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    //
     protected $table = "loaitin";

     public function theloai(){ 

     	return $this -> belongsTo('App\Theloai','id_theloai','id');
     }

     public function tintuc(){

     	Return $this->hasMany('App\Tintuc','id_loaitin','id');
     }

}
