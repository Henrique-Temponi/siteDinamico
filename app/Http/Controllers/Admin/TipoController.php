<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipoController extends Controller
{
    public function index()
    {
        $registros = Tipo::all();
        return view('admin.tipos.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.tipos.adicionar');
    }
    
    public function salvar(Request $request)
    {
        $dados = $request->all();
        // dd($dados);

        $registro = new Tipo();
        $registro->titulo = $dados['titulo'];
        $registro->save();

        Session::flash('mensagem', [
            'msg' => 'Tipo criado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.tipos');
    }

    public function editar($id)
    {
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Tipo::find($id);
        $registro->update($request->all());

        Session::flash('mensagem', [
            'msg' => 'Tipo atualizado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.tipos');
    }

    public function deletar($id)
    {
        Tipo::find($id)->delete();

        Session::flash('mensagem', [
            'msg' => 'Tipo deletado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.tipos');
    }
}
