@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Editar Slide</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.slides') }}" class="breadcrumb">Lista de Slides</a>
                <a class="breadcrumb">Editar Slide</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.slides.atualizar', $registro->id) }}" method="POST"
            enctype="multipart/form-data">
            
            {{csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.slides._form')

            <button class="btn yellow">atualizar</button>

        </form>
    </div>
</div>

@endsection