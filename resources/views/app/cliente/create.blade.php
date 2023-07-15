@extends('app.layouts.basico')

@section('titulo', 'Adicionar - Cliente')

@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina">             
        <p class="fornecedor">Adicionar cliente</p>        
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <pre>
        
    </pre>
    <div class="informacao-pagina">
        <div style="width: 30%; margin: 0 auto;">
            @component('app.cliente._components.form_create_edit')                
            @endcomponent
        </div>
    </div>
</div>

@endsection