@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Lista de Papeis para {{$usuario->name}}</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de usuarios</a>
                <a class="breadcrumb">Lista de Papeis</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">

        <form action="{{ route('admin.usuarios.papel.salvar', $usuario->id) }}" method="POST">
            {{ csrf_field() }}

            <div class="input-field">
                <select name="papel_id">
                    @foreach($papel as $valor)
                        <option value="{{ $valor->id }}">{{$valor->nome}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn blue">Adicionar</button>
        </form>
    </div>
    
    <div class="divider"></div>

    <div class="row">
        <table>
            <thead>
                <th>Papel</th>
                <th>Descricao</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($usuario->papeis as $p)
                    <tr>
                        <td>{{$p->nome}}</td>
                        <td>{{$p->descricao}}</td>
                        <td>
                            <a class="btn red" href="javascript:
                                if(confirm('Remover esse papel?')){
                                    window.location.href = '{{ route('admin.usuarios.papel.remover', [$usuario->id, $p->id]) }}' 
                                }">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection