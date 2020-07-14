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

        return view('site.imovel', $id);
    }
}
