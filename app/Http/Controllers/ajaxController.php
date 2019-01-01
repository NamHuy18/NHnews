<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Loaitin;
use App\Theloai;
use App\Requests;

class ajaxController extends Controller
{
    public function getLoaitin($id_theloai){
    	$loaitin=Loaitin::where('id_theloai',$id_theloai)->get();
    	foreach($loaitin as $lt)
    	{
    		echo "<option value='".$lt->id."'>".$lt->ten."</option>";
    	}
    }
}
