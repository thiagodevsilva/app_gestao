<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use App\Models\Fornecedor;
use App\Models\Item;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $produtos = Item::with('itemDetalhe', 'fornecedor')->paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $regras = [
            'nome' => 'required|min:3|max:70',
            'descricao' => 'required|min:3|max:2700',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',            
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'Campo obrigatório',
            'nome.min' => 'Mínimo 3 caracteres',
            'nome.max' => 'Máximo 70 caracteres',
            'descricao.min' => 'Mínimo 3 caracteres',
            'descricao.max' => 'Máximo 2700 caracteres',
            'peso.integer' => 'Apenas números inteiros',
            'unidade_id.exists' => 'Unidade não existe',
            'fornecedor_id.exists' => 'Fornecedor não existe'
        ];

        $request->validate($regras, $feedback);

        Item::create($request->all(0));
        return redirect()->route('app.produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:70',
            'descricao' => 'required|min:3|max:2700',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'Campo obrigatório',
            'nome.min' => 'Mínimo 3 caracteres',
            'nome.max' => 'Máximo 70 caracteres',
            'descricao.min' => 'Mínimo 3 caracteres',
            'descricao.max' => 'Máximo 2700 caracteres',
            'peso.integer' => 'Apenas números inteiros',
            'unidade_id.exists' => 'Unidade não existe',
            'fornecedor_id.exists' => 'Fornecedor não existe'
        ];

        $produto->update($request->all());
        return redirect()->route('app.produto.show', ['produto' => $produto->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
        $produto->delete();
        return redirect()->route('app.produto.index');
    }
}
