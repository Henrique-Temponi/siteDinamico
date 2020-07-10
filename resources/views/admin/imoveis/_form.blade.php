<div class="input-field">
    <input type="text" name="nome" class="validate" id="nome" value="{{
        isset($registro->nome ) ? $registro->nome : '' 
    }}">
    <Label for="nome">Nome: </Label>
</div>
<div class="input-field">
    <input type="text" name="estado" class="validate" id="estado" value="{{
        isset($registro->estado ) ? $registro->estado : '' 
    }}">
    <Label for="estado">Estado: </Label>
</div>
<div class="input-field">
    <input type="text" name="sigla_estado" class="validate" id="sigla_estado" value="{{
        isset($registro->sigla_estado ) ? $registro->sigla_estado : '' 
    }}">
    <Label for="sigla_estado">Sigla estado: </Label>
</div>