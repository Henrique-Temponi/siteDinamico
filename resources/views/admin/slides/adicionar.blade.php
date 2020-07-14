@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Adicionar Slide</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.slides') }}" class="breadcrumb">Lista de Slides</a>
                <a class="breadcrumb">Adicionar Slide</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{ route('admin.slides.salvar') }}" method="POST"
            enctype="multipart/form-data">
            {{csrf_field() }}
            @include('admin.slides._form')

            <button class="btn yellow">Adicionar</button>

        </form>
    </div>
</div>

@endsection