<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SlideController extends Controller
{
    public function index()
    {
        $registros = Slide::orderBy('ordem')->get();
        // dd($registros);

        return view('admin.slides.index', compact('registros'));
    }

    public function adicionar()
    {

        return view('admin.slides.adicionar');
    }
    
    public function salvar(Request $request)
    {

        // dd($request, $request->hasFile('imagem'));

        if(Slide::count()){
            $slide = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slide->ordem;
        }
        else {
            $ordemAtual = 0;
        }

        if($request->hasFile('imagems')){
            $arquivos = $request->file('imagems');

            foreach ($arquivos as $imagem) {
                $registro = new Slide();

                $rand = rand(11111, 99999);
                $diretorio = "img/slides/";

                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;

                $imagem->move($diretorio, $nomeArquivo);

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

        return redirect()->route('admin.slides');
    }

    public function editar($id)
    {
        $registro = Slide::find($id);

        return view('admin.slides.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Slide::find($id);

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111, 99999);
            $diretorio = "img/slides/";
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

        return redirect()->route('admin.slides');
    }

    public function deletar($id)
    {   
        $slide = Slide::find($id);

        $slide->delete();

        Session::flash('mensagem', [
            'msg' => 'Imovel deletado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.slides');

    } 
}
