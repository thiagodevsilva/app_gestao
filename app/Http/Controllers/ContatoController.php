<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    //
    function contato(Request $request) {

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo');
        // $contato->msg = $request->input('msg');

        

        // $contato->save();

        
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        // echo '<pre>';
        // print_r($contato->getAttributes());
        // echo '</pre>';

        $motivos_contato = MotivoContato::all();
        

        return view('site.contato', ['titulo' => 'Contato', 'motivos_contato' => $motivos_contato]);

    }

    public function salvar(Request $request) {
        //validar dados
        $request->validate([
            'nome' => 'required|min:3|max:100',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'msg' => 'required|max:2000'
        ]);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
