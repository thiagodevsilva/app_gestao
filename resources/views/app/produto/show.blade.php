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
            <table border="1">
                <tr>
                    <td>ID:</td>
                    <td>{{ $produto->id }}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{ $produto->descricao }}</td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td>{{ $produto->peso }}kg</td>
                </tr>
                <tr>
                    <td>Unidade de medida:</td>
                    <td>{{ $produto->unidade_id }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection