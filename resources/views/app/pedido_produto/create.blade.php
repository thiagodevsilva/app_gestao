@extends('app.layouts.basico')

@section('titulo', 'Pedido produto')

@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina">             
        <p class="fornecedor">Pedido produto</p>        
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do pedido</h4>
        <p>ID do pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>

        <div style="width: 30%; margin: 0 auto;">
            <h4>Itens do pedido</h4>
            <table class="" border="1" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do produto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)                        
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])                
            @endcomponent
        </div>
    </div>
</div>

@endsection