<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index($id)
    {
        // dd($id);

        $imovel = Imovel::find(1);
        $direcaoImagem = ['center-align', 'left-align', 'right-align'];


        return view('site.imovel', compact('imovel', 'direcaoImagem'));
    }
}
