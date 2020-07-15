@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Lista de Papeis</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a class="breadcrumb">Lista de Papeis</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="divider"></div>
    <div class="row">
        <table>
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($registros as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->nome}}</td>
                        <td>{{$p->descricao}}</td>
                        <td>
                            @if($p->nome != "admin")
                                <a class="btn orange" href="{{ route('admin.papel.editar', $p->id) }}">Editar</a>
                                <a class="btn purple" href="{{ route('admin.papel.permissao', $p->id) }}">Permissao</a>
                                <a class="btn red" href="javascript:
                                    if(confirm('Deletar esse registro?')){
                                        window.location.href = '{{ route('admin.papel.deletar', $p->id) }}' 
                                    }">Deletar</a>
                            @else
                                <a class="btn orange disabled">Editar</a>
                                <a class="btn red disabled">Deletar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            <a class="btn green" href="{{ route('admin.papel.adicionar') }}">Adicionar</a>
    </div>
</div>

@endsection