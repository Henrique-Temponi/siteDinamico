@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar Cidade</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.cidades') }}" class="breadcrumb">Lista de Cidades</a>
                <a class="breadcrumb">Editar Cidades</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.cidades.atualizar', $registro->id) }}" method="POST">
            {{csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.cidades._form')

            <button class="btn yellow">atualizar</button>

        </form>
    </div>
</div>

@endsection