<div class="input-field">
    <input type="text" name="nome" class="validate" id="nome" value="{{
        isset($registro->nome ) ? $registro->nome : '' 
    }}">
    <Label for="nome">Nome: </Label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validate" id="descricao" value="{{
        isset($registro->descricao ) ? $registro->descricao : '' 
    }}">
    <Label for="descricao">Descricao: </Label>
</div>