@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar pagina</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.paginas') }}" class="breadcrumb">Lista de Paginas</a>
                <a class="breadcrumb">Editar Pagina</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.paginas.atualizar', $pagina->id) }}" method="POST">
            {{csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.paginas._form')

            <button class="btn yellow">atualizar</button>

        </form>
    </div>
</div>

@endsection