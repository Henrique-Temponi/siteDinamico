@if(isset($registro->imagem))

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
    <input type="text" name="ordem" class="validate" id="ordem" value="{{
        isset($registro->ordem ) ? $registro->ordem : '' 
    }}">
    <Label for="ordem">Ordem: </Label>
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

        <img width="120" src="{{ asset($registro->imagem) }}">
        
    </div>
</div>

@else

<div class="row">
    <div class="file-field input-field">
        <div class="btn">
            <span>Upload de imagems</span>
            <input type="file" multiple name="imagems[]">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
</div>


@endif