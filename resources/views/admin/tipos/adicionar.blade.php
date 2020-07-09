@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar Tipos</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.tipos') }}" class="breadcrumb">Lista de tipos</a>
                <a class="breadcrumb">Adicionar Tipos</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.tipos.salvar') }}" method="POST">
            {{csrf_field() }}
            @include('admin.tipos._form')

            <button class="btn yellow">Adicionar</button>

        </form>
    </div>
</div>

@endsection