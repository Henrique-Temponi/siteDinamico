<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::all();

        return view('site.imovel', compact('imoveis'));
    }
}
