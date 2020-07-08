<div class="input-field">
    <input type="text" name="titulo" class="validate" id="titulo" value="{{
        isset($pagina->titulo ) ? $pagina->titulo : '' 
    }}">
    <Label for="titulo">Titulo: </Label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validate" id="descricao" value="{{
        isset($pagina->descricao ) ? $pagina->descricao : '' 
    }}">
    <Label for="descricao">Descricao: </Label>
</div>

@if(isset($pagina->email))
    <div class="input-field">
        <input type="text" name="email" class="validate" id="email" value="{{
            isset($pagina->email ) ? $pagina->email : '' 
        }}">
        <Label for="email">E-mail: </Label>
    </div>
@endif

<div class="input-field">
    <textarea class="materialize-textarea" id="textarea" value="{{
            isset($pagina->texto ) ? $pagina->texto : '' 
        }}"></textarea>
    <Label for="textarea">Texto: </Label>
</div>

<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
        @if(isset($pagina->imagem))
            <img width="120" src="{{ asset('$pagina->imagem') }}">
        @endif
    </div>
</div>

<div class="input-field">
    <input type="text" name="mapa" class="validate" id="mapa" value="{{
        isset($pagina->mapa ) ? $pagina->mapa : '' 
    }}">
    <Label for="mapa">Mapa: </Label>
</div>