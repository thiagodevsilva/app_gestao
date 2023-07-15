@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p class="fornecedor">Pedidos</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin: 0 auto;">
            
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('app.pedido-produto.create', ['pedido' => $pedido->id ]) }}">Adicionar Produtos</a></td>
                            <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                                
                            </td>
                            <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="display: flex; justify-content: space-around;">
                @if ($pedidos->appends($request)->previousPageUrl())
                    <a href="{{ $pedidos->appends($request)->previousPageUrl() }}">Voltar</a>
                @endif
                <div>
                    <span>Página: {{ $pedidos->appends($request)->currentPage() }} / {{ $pedidos->appends($request)->lastPage() }}</a>
                </div>
                @if ($pedidos->appends($request)->hasMorePages())
                    <a href="{{ $pedidos->appends($request)->nextPageUrl() }}">Próxima</a>
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection