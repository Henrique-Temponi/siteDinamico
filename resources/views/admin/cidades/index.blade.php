@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Lista de Cidades</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a class="breadcrumb">Lista de Cidades</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="divider"></div>
    <div class="row">
        <table>
            <thead>
                <th>Id</th>
                <th>nome</th>
                <th>estado</th>
                <th>sigla_estado</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($registros as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->nome}}</td>
                        <td>{{$p->estado}}</td>
                        <td>{{$p->sigla_estado}}</td>
                        <td>
                            <a class="btn orange" href="{{ route('admin.cidades.editar', $p->id) }}">Editar</a>
                            <a class="btn red" href="javascript:
                                if(confirm('Deletar esse registro?')){
                                    window.location.href = '{{ route('admin.cidades.deletar', $p->id) }}' 
                                }">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            <a class="btn green" href="{{ route('admin.cidades.adicionar') }}">Adicionar</a>
    </div>
</div>

@endsection