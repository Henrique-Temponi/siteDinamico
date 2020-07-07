<div class="input-field">
    <input type="text" name="name" class="validate" id="name" value="{{
        isset($usuario->name ) ? $usuario->name : '' 
    }}">
    <Label for="name">Name: </Label>
</div>
<div class="input-field">
    <input type="text" name="email" class="validate" id="email" value="{{
        isset($usuario->email) ? $usuario->email : '' 
    }}">
    <Label for="email">E-mail: </Label>
</div>
<div class="input-field">
    <input type="password" name="password" class="validate" id="password">
    <Label for="password">Senha: </Label>
</div>