@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Editar Papel</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.papel') }}" class="breadcrumb">Lista de Papeis</a>
                <a class="breadcrumb">Editar Papel</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.papel.atualizar', $registro->id) }}" method="POST">
            {{csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.papel._form')

            <button class="btn yellow">atualizar</button>

        </form>
    </div>
</div>

@endsection