<?php

namespace App\Http\Controllers\Site;

use App\Cidade;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Slide;
use App\Tipo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::where('publicar', '=', 'sim')->orderBy('id', 'desc')->paginate(1);
        $slides = Slide::where('publicado', '=', 'sim')->orderBy('ordem')->get();
        $direcaoImagem = ['center-align', 'left-align', 'right-align'];
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();

        $paginacao = true;

        return view('site.home', compact('imoveis', 'slides','direcaoImagem', 'paginacao', 'tipos', 'cidades'));
    }

    public function busca(Request $request)
    {
        $busca = $request->all();
        
        $paginacao = false;
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();
        
        // dd($tipos[0]->id);
        
        if($busca['status'] == 'todos') {
            $testStatus = [
                ['status','<>', null]
            ];
        }else {
            $testStatus = [
                ['status', '=', $busca['status']]
            ];
        }

        if($busca['tipo_id'] == 'todos') {
            $testtipo_id = [
                ['tipo_id','<>', null]
            ];
        }else {
            $testtipo_id = [
                ['tipo_id', '=', $busca['tipo_id']]
            ];
        }

        if($busca['cidade_id'] == 'todos') {
            $testcidade_id = [
                ['cidade_id','<>', null]
            ];
        }else {
            $testcidade_id = [
                ['cidade_id', '=', $busca['cidade_id']]
            ];
        }
        
        $testeDorm = [
            ['dormitorios', '>=', 0],
            ['dormitorios', '>=', 1],
            ['dormitorios', '>=', 2],
            ['dormitorios', '>=', 3],
        ];

        $numDorm = $busca['dormitorios'];

        $testValor = [
            [['valor', '>=', '0']],
            [['valor', '<=', '500']],
            [['valor', '>=', '500'],['valor', '<=', '1000']],
            [['valor', '>=', '1000']],
        ];  

        $numValor = $busca['valor'];

        if($busca['bairro'] != ''){
            $testebairro = [
                ['endereco', 'like', '%'.$busca['bairro'].'%']
            ];
        }
        else {
            $testebairro = [
                ['endereco', '<>', null]
            ];
        }
        
        $imoveis = Imovel::where('publicar', '=', 'sim')
            ->where($testStatus)
            ->where($testtipo_id)
            ->where($testcidade_id)
            ->where([$testeDorm[$numDorm]])
            ->where($testValor[$numValor])
            ->where($testebairro)
            ->orderBy('id', 'desc')->get();


        return view('site.busca', compact('busca', 'imoveis', 'paginacao', 'tipos', 'cidades'));
    }
}
