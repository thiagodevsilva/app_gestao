@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p class="fornecedor">Clientes</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin: 0 auto;">
            
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                                
                            </td>
                            <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="display: flex; justify-content: space-around;">
                @if ($clientes->appends($request)->previousPageUrl())
                    <a href="{{ $clientes->appends($request)->previousPageUrl() }}">Voltar</a>
                @endif
                <div>
                    <span>Página: {{ $clientes->appends($request)->currentPage() }} / {{ $clientes->appends($request)->lastPage() }}</a>
                </div>
                @if ($clientes->appends($request)->hasMorePages())
                    <a href="{{ $clientes->appends($request)->nextPageUrl() }}">Próxima</a>
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection