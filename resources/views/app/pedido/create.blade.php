@extends('app.layouts.basico')

@section('titulo', 'Adicionar - Pedido')

@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina">             
        <p class="fornecedor">Adicionar pedido</p>        
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <pre>
        
    </pre>
    <div class="informacao-pagina">
        <div style="width: 30%; margin: 0 auto;">
            @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])                
            @endcomponent
        </div>
    </div>
</div>

@endsection