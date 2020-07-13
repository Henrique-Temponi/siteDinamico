@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Lista de Imoveis</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a class="breadcrumb">Lista de Imoveis</a>
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
                <th>Status</th>
                <th>Cidade</th>
                <th>Valor</th>
                <th>Imagem</th>
                <th>Publicado</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($registros as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->titulo }}</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->cidade->nome }}</td>
                        <td>R$ {{number_format($p->valor, 2, ",", ".")}}</td>
                        <td><img width="100" src="{{ asset($p->imagem) }}"></td>
                        <td>{{ $p->publicar }}</td>
                        <td>
                            <a class="btn orange" href="{{ route('admin.imoveis.editar', $p->id) }}">Editar</a>
                            <a class="btn red" href="javascript:
                                if(confirm('Deletar esse registro?')){
                                    window.location.href = '{{ route('admin.imoveis.deletar', $p->id) }}' 
                                }">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            <a class="btn green" href="{{ route('admin.imoveis.adicionar') }}">Adicionar</a>
    </div>
</div>

@endsection