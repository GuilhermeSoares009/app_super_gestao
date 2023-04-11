<h3>Fornecedores</h3>

@isset($fornecedores)
    @foreach ($fornecedores as $indices )
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] }}
        <br>
        telefone: ({{ $fornecedor['ddd'] }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        
        @if($loop->first)
            Primeira iteração do Loop
        @endif 

        @if($loop->last)
            Última iteração do Loop

            <br>
            Total de registros: {{ $loop->count }}
        @endif
    @endforeach
    
@empty
    Não existe fornecedores cadastrados
@endisset