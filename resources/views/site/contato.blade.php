@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row section">
        <h3 align="center">Contato</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m7">
            <img class="responsive-img" src="{{ asset('img/modelo_img_home.jpg') }}">
        </div>
        <div class="col s12 m5">
            <form class="col s12" action="">
                <div class="input-field">
                    <input type="text" name="name" class="validate" id="name">
                    <label for="name">Nome</label>
                </div>
                <div class="input-field">
                    <input type="text" name="email" class="validate" id="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field">
                    <textarea name="descricao" id="descricao" class="materialize-textarea"></textarea>
                    <label for="descricao">Descricao</label>
                </div>
                <button class="btn blue">Enviar</button>
            </form>
        </div>
    </div>
</div>

@endsection