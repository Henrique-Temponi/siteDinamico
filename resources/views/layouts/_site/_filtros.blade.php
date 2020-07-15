<div class="row">
    <form action="{{ route('site.busca') }}">
        <div class="input-field col s6 m4">
            <select name="status">
                <option value="todos">Aluga e Vende</option>
                <option value="aluga">Aluga</option>
                <option value="vende">Vende</option>
            </select>
            <label for="">Status</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="tipo_id">
                <option value="todos">Todos os tipos</option>
                
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->titulo }}</option>
                @endforeach

            </select>
            <label for="">Tipo de imovel</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="cidade_id">
                <option value="todos">Todas as cidades</option>

                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach

            </select>
            <label for="">Cidade</label>
        </div>
        <div class="input-field col s6 m3">
            <select name="dormitorios">
                <option value="todos">Todos os dormitorios</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">Mais</option>
            </select>
            <label for="">Dormitorio</label>
        </div>
        <div class="input-field col s12 m4">
            <select name="valor">
                <option value="todos">Todos os valores</option>
                <option value="1">Ate R$ 500</option>
                <option value="2">R$ 500 a 1000</option>
                <option value="3">Mais de R$ 1000</option>
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