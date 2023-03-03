<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class IndexController extends Controller
{
    //
    function index() {
        $motivos_contato = MotivoContato::all();

        return view('site.index', ['motivos_contato' => $motivos_contato]);
    }
}
