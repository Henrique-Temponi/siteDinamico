@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar Imoveis</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imoveis</a>
                <a class="breadcrumb">Editar Imoveis'</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.imoveis.atualizar', $registro->id) }}" method="POST"
            enctype="multipart/form-data">
            
            {{csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.cidades._form')

            <button class="btn yellow">atualizar</button>

        </form>
    </div>
</div>

@endsection