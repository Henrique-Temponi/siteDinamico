@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar Imovel</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imovel</a>
                <a class="breadcrumb">Adicionar Imovel</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.imoveis.salvar') }}" method="POST">
            {{csrf_field() }}
            @include('admin.imoveis._form')

            <button class="btn yellow">Adicionar</button>

        </form>
    </div>
</div>

@endsection