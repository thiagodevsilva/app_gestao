@extends('app.layouts.basico')

@section('titulo', 'Adicionar - Produto')

@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina">             
        <p class="fornecedor">Adicionar produto</p>        
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.produto.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <pre>
        
    </pre>
    <div class="informacao-pagina">
        <div style="width: 30%; margin: 0 auto;">
            @component('app.produto._components.form_create_edit', ['unidades' => $unidades, 'fornecedores' => $fornecedores])                
            @endcomponent
        </div>
    </div>
</div>

@endsection