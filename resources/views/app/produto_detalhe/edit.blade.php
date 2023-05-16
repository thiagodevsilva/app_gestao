@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina">
        <p class="fornecedor">Editar Detalhes do Produto</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.produto_detalhe.index') }}">Voltar</a></li>
        </ul>
    </div>
    <pre>
        
    </pre>
    <div class="informacao-pagina">

        <h4>Produto</h4>
        <div>
            <label>Nome: </label>
            {{ $produto_detalhe->produto->nome }}
        </div>
        <div>
            <label>Descrição: </label>
            {{ $produto_detalhe->produto->descricao }}
        </div>
        <div style="width: 30%; margin: 0 auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])                
            @endcomponent
        </div>
    </div>
</div>

@endsection