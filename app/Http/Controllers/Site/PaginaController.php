<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function sobre()
    {
        $pagina = Pagina::where('tipo', '=', 'Sobre')->first();
        // dd($pagina);

        return view('site.sobre', compact('pagina'));
    }
}
