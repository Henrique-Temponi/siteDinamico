@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar usuario</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de usuarios</a>
                <a href="#" class="breadcrumb">Adicionar Usuario</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.usuarios.salvar') }}" method="POST">
            {{csrf_field() }}
            @include('admin.usuarios._form')

            <button class="btn yellow">Adicionar</button>

        </form>
    </div>
</div>

@endsection