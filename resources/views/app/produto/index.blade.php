@extends('app.layouts.basico')

@section('titulo', 'Listar - Produtos')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p class="fornecedor">Produtos</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.produto.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin: 0 auto;">
            {{ $produtos->toJson() }}
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                            <td><a href="{{ route('app.produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{ route('app.produto.destroy', ['produto' => $produto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                                
                            </td>
                            <td><a href="{{ route('app.produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="display: flex; justify-content: space-around;">
                @if ($produtos->appends($request)->previousPageUrl())
                    <a href="{{ $produtos->appends($request)->previousPageUrl() }}">Voltar</a>
                @endif
                <div>
                    <span>Página: {{ $produtos->appends($request)->currentPage() }} / {{ $produtos->appends($request)->lastPage() }}</a>
                </div>
                @if ($produtos->appends($request)->hasMorePages())
                    <a href="{{ $produtos->appends($request)->nextPageUrl() }}">Proxima</a>
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection