@extends('app.layouts.basico')

@section('titulo', 'Listar - Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p class="fornecedor">Listar fornecedor</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin: 0 auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>Uf</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de produtos</p>
                                <table border="1" style="margin: 20px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->produtos as $key => $produto )
                                            <tr>
                                                <td>{{ $produto->id }}</td>
                                                <td>{{ $produto->nome }}</td>
                                            </tr>
                                        @endforeach                                        
                                    </tbody>

                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="display: flex; justify-content: space-around;">
                @if ($fornecedores->appends($request)->previousPageUrl())
                    <a href="{{ $fornecedores->appends($request)->previousPageUrl() }}">Voltar</a>
                @endif
                <div>
                    <span>Página: {{ $fornecedores->appends($request)->currentPage() }} / {{ $fornecedores->appends($request)->lastPage() }}</a>
                </div>
                @if ($fornecedores->appends($request)->hasMorePages())
                    <a href="{{ $fornecedores->appends($request)->nextPageUrl() }}">Proxima</a>
                @endif
            </div>
            
        </div>
    </div>
</div>

@endsection