@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">lista de Slides</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a class="breadcrumb">Galeria de Imagems</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="divider"></div>
    <div class="row">
        <table>
            <thead>
                <th>Ordem</th>
                <th>Titulo</th>
                <th>descricao</th>
                <th>publicado</th>
                <th>imagem</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($registros as $p)
                    <tr>
                        <td>{{ $p->ordem }}</td>
                        <td>{{ $p->titulo }}</td>
                        <td>{{ $p->descricao }}</td>
                        <td>{{ $p->publicado }}</td>
                        <td><img width="100" src="{{ asset($p->imagem) }}"></td>
                        <td>
                            <a class="btn orange" href="{{ route('admin.slides.editar', $p->id) }}">Editar</a>
                            <a class="btn red" href="javascript:
                                if(confirm('Deletar esse registro?')){
                                    window.location.href = '{{ route('admin.slides.deletar', $p->id) }}' 
                                }">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            <a class="btn green" href="{{ route('admin.slides.adicionar')}}">Adicionar</a>
    </div>
</div>

@endsection