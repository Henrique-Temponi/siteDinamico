<?php

namespace App\Http\Controllers\Admin;

use App\Cidade;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

        // dd($request);

        $registro = new Imovel($request->all());
        $registro->vizualizacoes = 0;
        
        if (isset($request->mapa) && trim($request->mapa) != "") {
            $registro->mapa = trim($request->mapa);
        } else {
            $registro->mapa = null;
        }

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111, 99999);
            $diretorio = "img/imoveis/". Str::slug($request->titulo, '_');
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio."/".$nomeArquivo;
        }

        $registro->save();

        Session::flash('mensagem', [
            'msg' => 'Registro criado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.imoveis');
    }

    public function editar($id)
    {
        $registro = Imovel::find($id);

        $tipos = Tipo::all();
        $cidades = Cidade::all();

        return view('admin.imoveis.editar', compact('tipos', 'cidades', 'registro'));
    }

    public function atualizar(Request $request, $id)
    {
        // dd($request);

        $registro = Imovel::find($id);

        if (isset($request->mapa) && trim($request->mapa) != "") {
            $registro->mapa = trim($request->mapa);
        } else {
            $registro->mapa = null;
        }

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111, 99999);
            $diretorio = "img/imoveis/". Str::slug($request->titulo, '_');
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio."/".$nomeArquivo;
        }

        $registro->update($request->all());

        Session::flash('mensagem', [
            'msg' => 'Imovel atualizado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.imoveis');
    }

    public function deletar($id)
    {   
        Imovel::find($id)->delete();

        Session::flash('mensagem', [
            'msg' => 'Imovel deletado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.imoveis');

    }    
}
