@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Lista de usuarios</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a class="breadcrumb">Lista de usuarios</a>
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
                <th>Email</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($usuarios as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->email}}</td>
                        <td>
                            <a class="btn orange" href="{{ route('admin.usuarios.editar', $p->id) }}">Editar</a>
                            <a class="btn purple" href="{{ route('admin.usuarios.papel', $p->id) }}">Papel</a>
                            <a class="btn red" href="javascript:
                                if(confirm('Deletar esse registro?')){
                                    window.location.href = '{{ route('admin.usuarios.deletar', $p->id) }}' 
                                }">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
            <a class="btn green" href="{{ route('admin.usuarios.adicionar') }}">Adicionar</a>
    </div>
</div>

@endsection