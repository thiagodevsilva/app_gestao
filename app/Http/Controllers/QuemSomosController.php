<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class QuemSomosController extends Controller
{
    //
    function __contruct() {
        $this->middleware(LogAcessoMiddleware::class);
    }

    function quemSomos() {
        return view('site.quemsomos');
    }
}
