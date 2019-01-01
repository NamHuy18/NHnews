<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class contactController extends Controller
{
    //
    public function Contact(){

    	$contact = Contact::paginate(5);
    	return view('admin.contact', compact('contact'));
    }
}
