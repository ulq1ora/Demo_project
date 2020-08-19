<?php

namespace App\Http\Controllers;

use App\modPasta;
use Illuminate\Http\Request;

class addPastaController extends Controller
{
    public function allData()
    {
        return view('addPasta');
    }
}
