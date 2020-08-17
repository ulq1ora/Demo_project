<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class addPastaController extends Controller
{
    public function allData()
    {
        return view('contact');
    }
}
