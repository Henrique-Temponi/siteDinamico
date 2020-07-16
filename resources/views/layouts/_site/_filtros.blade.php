<div class="row">
    <form action="{{ route('site.busca') }}">
        <div class="input-field col s6 m4">
            <select name="status">
                <option value="todos"{{ isset($busca['status']) && $busca['status'] == 'todos' ? 'selected' : '' }}>Aluga e Vende</option>
                <option value="aluga" {{ isset($busca['status']) && $busca['status'] == 'aluga' ? 'selected' : '' }}>Aluga</option>
                <option value="vende" {{ isset($busca['status']) && $busca['status'] == 'vende' ? 'selected' : '' }}>Vende</option>
            </select>
            <label for="">Status</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="tipo_id">
                <option value="todos" {{ isset($busca['tipo_id']) && $busca['tipo_id'] == 'todos' ? 'selected' : '' }} >Todos os tipos</option>
                
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id ? 'selected' : '' }}>{{ $tipo->titulo }}</option>
                @endforeach

            </select>
            <label for="">Tipo de imovel</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="cidade_id">
                <option value="todos" {{ isset($busca['cidade_id']) && $busca['cidade_id'] == 'todos' ? 'selected' : '' }}>Todas as cidades</option>

                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}" {{ isset($busca['cidade_id']) && $busca['cidade_id'] ==  $cidade->id ? 'selected' : '' }} >{{ $cidade->nome }}</option>
                @endforeach

            </select>
            <label for="">Cidade</label>
        </div>
        <div class="input-field col s6 m3">
            <select name="dormitorios">
                <option value="0" {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 'todos' ? 'selected' : '' }}>Todos os dormitorios</option>
                <option value="1"{{ isset($busca['dormitorios']) && $busca['dormitorios'] == '1' ? 'selected' : '' }} >1</option>
                <option value="2"{{ isset($busca['dormitorios']) && $busca['dormitorios'] == '2' ? 'selected' : '' }} >2</option>
                <option value="3"{{ isset($busca['dormitorios']) && $busca['dormitorios'] == '3' ? 'selected' : '' }} >Mais</option>
            </select>
            <label for="">Dormitorio</label>
        </div>
        <div class="input-field col s12 m4">
            <select name="valor">
                <option value="0" {{ isset($busca['valor']) && $busca['valor'] == 'todos' ? 'selected' : '' }}>Todos os valores</option>
                <option value="1" {{ isset($busca['valor']) && $busca['valor'] == '1' ? 'selected' : '' }} >Ate R$ 500</option>
                <option value="2" {{ isset($busca['valor']) && $busca['valor'] == '2' ? 'selected' : '' }} >R$ 500 a 1000</option>
                <option value="3" {{ isset($busca['valor']) && $busca['valor'] == '3' ? 'selected' : '' }} >Mais de R$ 1000</option>
            </select>
            <label for="">Valor</label>
        </div>
        <div class="input-field col s12 m3">
            <input type="text" class="validate" name="bairro">
            <label for="">bairro</label>
        </div>
        <div class="input-field col s12 m2">
            <button class="btn deep-range darken-1 right">Filtrar</button>
        </div>
    </form>
</div>