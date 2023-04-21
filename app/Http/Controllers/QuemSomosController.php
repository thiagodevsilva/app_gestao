<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuemSomosController extends Controller
{
    function quemSomos() {
        return view('site.quemsomos');
    }
}
