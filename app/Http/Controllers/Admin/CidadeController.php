<?php

namespace App\Http\Controllers\Admin;

use App\Cidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CidadeController extends Controller
{
    public function index()
    {
        $registros = Cidade::all();
        return view('admin.cidades.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.cidades.adicionar');
    }
    
    public function salvar(Request $request)
    {
        // $dados = $request->all();
        // dd($dados);

        // $registro->nome = $dados['nome'];
        // $registro->estado = $dados['estado'];
        // $registro->sigla_estado = $dados['sigla_estado'];

        $registro = new Cidade($request->all());
        $registro->save();

        Session::flash('mensagem', [
            'msg' => 'Tipo criado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.cidades');
    }

    public function editar($id)
    {
        $registro = Cidade::find($id);
        return view('admin.cidades.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Cidade::find($id);
        $registro->update($request->all());

        Session::flash('mensagem', [
            'msg' => 'Cidade atualizado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.cidades');
    }

    public function deletar($id)
    {
        Cidade::find($id)->delete();

        Session::flash('mensagem', [
            'msg' => 'Tipo deletado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.cidades');
    }
}
