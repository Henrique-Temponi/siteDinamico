<div class="input-field row">
    <input type="text" name="titulo" class="validate" id="titulo" value="{{
        isset($registro->titulo ) ? $registro->titulo : '' 
    }}">
    <Label for="titulo">Titulo: </Label>
</div>
<div class="input-field row">
    <input type="text" name="descricao" class="validate" id="descricao" value="{{
        isset($registro->descricao ) ? $registro->descricao : '' 
    }}">
    <Label for="descricao">descricao: </Label>
</div>
<div class="input-field row">
    <input type="text" name="titulo" class="validate" id="titulo" value="{{
        isset($registro->titulo ) ? $registro->titulo : '' 
    }}">
    <Label for="titulo">Titulo: </Label>
</div>

<div class="row">
    <div class="file-field input-field">
        <div class="btn">
            <span>imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
        @if(isset($registro->imagem))
            <img width="120" src="{{ asset($registro->imagem) }}">
        @endif
    </div>
</div>

<div class="input-field col m6">
    <select name="status" id="status">
        <option value="aluga" {{ (isset($registro->status) && $registro->status == 'aluga' ? 'selected' : '' )}}>Aluga</option>
        <option value="vende" {{ (isset($registro->status) && $registro->status == 'vende' ? 'selected' : '' )}}>Vende</option>
    </select>
    <label for="status">Status</label>
</div>


<div class="input-field col m6">
    <select name="tipo_id" id="tipo_id">
        @foreach($tipos as $tipo)
            <option value="{{$tipo->id}}" {{(isset($registro->id) && $registro->tipo_id == $tipo->id ? 'selected' : '') }}
                >{{$tipo->titulo}}
            </option>
        @endforeach
    </select>
    <label for="tipo_id">Tipo: </label>
</div>


<div class="input-field col m12 ">
    <input type="text" name="enderec" class="validate" id="enderec" value="{{(isset($registro->endereco ) ? $registro->endereco : '' 
    )}}">
    <Label for="enderec">endereco: </Label>
</div>


<div class="input-field col m12">
    <input type="text" name="cep" class="validate" id="cep" value="{{
        isset($registro->cep ) ? $registro->cep : '' 
    }}">
    <Label for="cep">cep: </Label>
</div>

<div class="input-field col s12">
    <select name="cidade_id" id="cidade_id">
        @foreach($cidades as $cidade)
            <option value="{{$cidade->id}}" {{ (isset($registro->id) && $registro->cidade_id == $cidade->id ? 'selected' : '')}}>
                {{ $cidade->titulo }}
            </option>
        @endforeach
    </select>
    <label for="cidade_id">Cidade: </label>
</div>

<div class="input-field col m12">
    <input type="text" name="dormitorios" class="validate" id="dormitorios" value="{{
        isset($registro->dormitorios ) ? $registro->dormitorios : '' 
    }}">
    <Label for="dormitorios">dormitorios: </Label>
</div>

<div class="input-field col m12">
    <input type="text" name="datalhes" class="validate" id="datalhes" value="{{
        isset($registro->datalhes ) ? $registro->datalhes : '' 
    }}">
    <Label for="datalhes">datalhes: </Label>
</div>

<div class="input-field col m12">
    <textarea name="mapa" id="mapa" class="materialize-textarea">
        {{ isset($registro->mapa ) ? $registro->mapa : ''}}
    </textarea>
    <Label for="mapa">mapa: </Label>
</div>

<div class="input-field col s12">
    <select name="publicar" id="publicar">
        <option value="sim" {{( isset($registro->publicar) && $registro->publicar == 'sim' ? 'selected' : '')}}>Sim</option>
        <option value="nao" {{( isset($registro->publicar) && $registro->publicar == 'nao' ? 'selected' : '')}}>Nao</option>
    </select>
    <label for="publicar">Publicar</label>
</div>