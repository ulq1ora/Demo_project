<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class addContactController extends Controller
{
    public function allData()
    {
        return view('contact');
    }
}
