@extends('welcome')

@section('content')

<div class="container">
    <h2 align="center">Lista de Permissoes para {{$papel->name}}</h2>

    <div class="row">
        <nav>
            <div class="nav-wrapper green">
            <div class="col s12">
                <a href="{{ route('admin.principal') }}" class="breadcrumb">Incio</a>
                <a href="{{ route('admin.papel') }}" class="breadcrumb">Lista de Papeis</a>
                <a class="breadcrumb">Lista de  Permissoes</a>
            </div>
            </div>
        </nav>
    </div>

    <div class="row">

        <form action="{{ route('admin.papel.permissao.salvar', $papel->id) }}" method="POST">
            {{ csrf_field() }}

            <div class="input-field">
                <select name="permissao_id">
                    @foreach($permissao as $valor)
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
                <th>Permissao</th>
                <th>Descricao</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach($papel->permissoes as $p)
                    <tr>
                        <td>{{$p->nome}}</td>
                        <td>{{$p->descricao}}</td>
                        <td>
                            <a class="btn red" href="javascript:
                                if(confirm('Remover essa permissao?')){
                                    window.location.href = '{{ route('admin.papel.permissao.remover', [$papel->id, $p->id]) }}' 
                                }">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection