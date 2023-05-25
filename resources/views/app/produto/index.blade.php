@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->site }}</td>
                                <td>{{ $produto->uf }}</td>
                                <td>{{ $produto->email }}</td>
                                <td>Excluir</td>
                                <td><a href="{{ route('app.fornecedor.editar', $produto->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}

                <br>
                Exibindo {{ $produtos->count() }} forncedores de  {{ $produtos->total() }} ( de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }} )
            </div>
        </div>
    </div>

@endsection
