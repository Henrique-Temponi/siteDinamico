@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Galerias de imagems</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imoveis</a>
                <a class="breadcrumb">Galeria de Imagems</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="divider"></div>
    <div class="row">
        <table>
            <thead>
                <th>Id</th>
                <th>Titulo</th>
                <th>descricao</th>
                <th>imagem</th>
                <th>ordem</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($registros as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->titulo }}</td>
                        <td>{{ $p->descricao }}</td>
                        <td><img width="100" src="{{ asset($p->imagem) }}"></td>
                        <td>{{ $p->ordem }}</td>
                        <td>
                            <a class="btn orange" href="{{ route('admin.galerias.editar', $p->id) }}">Editar</a>
                            <a class="btn red" href="javascript:
                                if(confirm('Deletar esse registro?')){
                                    window.location.href = '{{ route('admin.galerias.deletar', $p->id) }}' 
                                }">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            <a class="btn green" href="{{ route('admin.galerias.adicionar', $imovel->id) }}">Adicionar</a>
    </div>
</div>

@endsection