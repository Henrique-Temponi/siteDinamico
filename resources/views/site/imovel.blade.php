@extends('layouts.site')

@section('content')

<div class="container">
    <div class="row section">
        <h3 align="center">Imovel</h3>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            <div class="row">
                <div class="slider">
                    <ul class="slides">
                        <li>
                            <img src="{{ asset('img/') }}" alt="Imagem">
                            <div class="caption center-align">
                                <h3>Titulo da imagem</h3>
                                <h5>Descricao</h5>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('img/') }}" alt="Imagem">
                            <div class="caption left-align">
                                <h3>Titulo da imagem</h3>
                                <h5>Descricao</h5>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('img/') }}" alt="Imagem">
                            <div class="caption right-align">
                                <h3>Titulo da imagem</h3>
                                <h5>Descricao</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row" align="center">
                <button onclick="sliderPrev()" class="btn blue">Anterior</button>
                <button onclick="sliderNext()" class="btn blue">Proxima</button>
            </div>
        </div>
        <div class="col s12 m4">
            <h4>Titulo do imovel</h4>
            <blockquote>
                Descricao breve sobre o imovel.
            </blockquote>
            <p><b>Codigo:</b> 234</p>
            <p><b>Status:</b> Vende</p>
            <p><b>tipo:</b> Alvenaria</p>
            <p><b>Endereco:</b> Centro</p>
            <p><b>Cep:</b> 81338464</p>
            <p><b>Cidade</b> Rua. banana</p>
            <p><b>Valor</b> R$ 20</p>
            <a class="btn deep-orange darken-1" href="{{ route('site.contato') }}">Entrar em contato</a>
        </div>
    </div>
</div>

@endsection