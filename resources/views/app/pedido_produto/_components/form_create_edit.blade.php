<form action="{{ route('pedido-produto.store',['pedido'] => $pedido) }}" method="post">
    @csrf

    <select name="cliente_id" id="">
        <option value=""> -- Selecione um Cliente --</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ (old('produto_id')) == $prduto->id ? 'selected': '' }}> {{ $produto->nome }} </option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id'): '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
