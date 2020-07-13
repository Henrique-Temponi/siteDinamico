@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar Imagem</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imovel</a>
                <a href="{{ route('admin.galerias', $imovel->id) }}" class="breadcrumb">Galeria de imagems</a>
                <a class="breadcrumb">Adicionar Imagem</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.galerias.salvar', $imovel->id) }}" method="POST"
            enctype="multipart/form-data">
            {{csrf_field() }}
            @include('admin.galerias._form')

            <button class="btn yellow">Adicionar</button>

        </form>
    </div>
</div>

@endsection