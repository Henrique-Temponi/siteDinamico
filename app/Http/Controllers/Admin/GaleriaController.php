<?php

namespace App\Http\Controllers\Admin;

use App\Cidade;
use App\Galeria;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GaleriaController extends Controller
{
    public function index($id)
    {
        $imovel = Imovel::find($id);

        $registros = $imovel->galeria()->orderBy('ordem')->get();
        // dd($registros);

        return view('admin.galerias.index', compact('registros', 'imovel'));
    }

    public function adicionar($id)
    {

        $imovel = Imovel::find($id);

        return view('admin.galerias.adicionar', compact('imovel'));
    }
    
    public function salvar(Request $request, $id)
    {

        // dd($request, $request->hasFile('imagem'));

        $imovel = Imovel::find($id);

        if($imovel->galeria()->count()){
            $galeria = $imovel->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        }
        else {
            $ordemAtual = 0;
        }

        if($request->hasFile('imagems')){
            $arquivos = $request->file('imagems');

            foreach ($arquivos as $imagem) {
                $registro = new Galeria();

                $rand = rand(11111, 99999);
                $diretorio = "img/imoveis/". Str::slug($imovel->titulo, '_');

                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;

                $imagem->move($diretorio, $nomeArquivo);

                $registro->imovel_id = $imovel->id;

                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;

                $registro->imagem = $diretorio."/".$nomeArquivo;

                $registro->save();
            }

            Session::flash('mensagem', [
                'msg' => 'Registro criado com sucesso',
                'class' => 'green white-text'
            ]);
    

        }
        else {
            Session::flash('mensagem', [
                'msg' => 'Erro ao criar o registro',
                'class' => 'red white-text'
            ]);
        }

        return redirect()->route('admin.galerias', $imovel->id);
    }

    public function editar($id)
    {
        $registro = Galeria::find($id);
        $imovel = $registro->imovel;

        return view('admin.galerias.editar', compact('registro', 'imovel'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Galeria::find($id);

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111, 99999);
            $diretorio = "img/imoveis/". Str::slug($registro->imovel->titulo, '_');
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio."/".$nomeArquivo;
        }

        $registro->update($request->all());

        Session::flash('mensagem', [
            'msg' => 'Imagem atualizado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.galerias', $registro->imovel->id);
    }

    public function deletar($id)
    {   
        $galeria = Galeria::find($id);

        $imovel = $galeria->imovel;

        $galeria->delete();

        Session::flash('mensagem', [
            'msg' => 'Imovel deletado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.galerias', $imovel->id);

    } 
}
