@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina">             
        <p class="fornecedor">Adicionar Detalhes do Produto</p>        
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <pre>
        
    </pre>
    <div class="informacao-pagina">
        <div style="width: 30%; margin: 0 auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])                
            @endcomponent
        </div>
    </div>
</div>

@endsection