<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Papel;
use Illuminate\Http\Request;

class PapelController extends Controller
{
    public function index()
    {
        $registros = Papel::all();
        return view('admin.papel.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.papel.adicionar');
    }

    public function salvar(Request $request)
    {
        Papel::create($request->all());

        return redirect()->route('admin.papel');
    }

    public function editar($id)
    {
        if(Papel::find($id)->nome == "admin"){

            return redirect()->route('admin.papel');
        }

        $registro = Papel::find($id);

        return view('admin.papel.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        if(Papel::find($id)->nome == "admin"){

            return redirect()->route('admin.papel');
        }

        Papel::find($id)->update($request->all()); 

        return redirect()->route('admin.papel');
    }

    public function deletar($id)
    {
        if(Papel::find($id)->nome == "admin"){

            return redirect()->route('admin.papel');
        }

        Papel::find($id)->delete();

        return redirect()->route('admin.papel');
    }
}
