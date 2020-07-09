<div class="input-field">
    <input type="text" name="titulo" class="validate" id="titulo" value="{{
        isset($registro->titulo ) ? $registro->titulo : '' 
    }}">
    <Label for="titulo">Titulo: </Label>
</div>