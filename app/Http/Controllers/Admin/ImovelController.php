<?php

namespace App\Http\Controllers\Admin;

use App\Cidade;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImovelController extends Controller
{
    public function index()
    {
        $registros = Imovel::all();
        return view('admin.imoveis.index', compact('registros'));
    }

    public function adicionar()
    {

        $tipos = Tipo::all();
        $cidades = Cidade::all();

        return view('admin.imoveis.adicionar', compact('tipos', 'cidades'));
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
        if(Imovel::where('cidade_id', '=', $id)->count()){

            $msg = "Nao e' possivel deletar essa cidade esses imoveis (";

            $imoveis = Imovel::where('cidade_id', '=', $id)->get();

            foreach ($imoveis as $imovel ) {
                $msg .= "id: ".$imovel->id." ";
            }

            $msg .= ") estao relacionados";

            Session::flash('mensagem', [
                'msg' => $msg,
                'class' => 'red white-text'
            ]);
    
            return redirect()->route('admin.cidades');

        }
        
        Cidade::find($id)->delete();

    }    
}
