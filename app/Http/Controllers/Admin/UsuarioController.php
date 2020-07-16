<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Papel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->all();
        // dd($dados);

        if(Auth::attempt([
            'email' => $dados['email'],
            'password' => $dados['password']
        ])) {

            Session::flash('mensagem', [
                'msg' => 'login realizado com sucesso',
                'class' => 'green white-text'
            ]);

            return redirect()->route('admin.principal');
        }

        Session::flash('mensagem', [
            'msg' => 'Erro confira seus dados',
            'class' => 'red white-text'
        ]);

        return redirect()->route('admin.login');
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {

        if(Gate::allows('usuario_listar')){
            
            $usuarios = User::all();
            return view('admin.usuarios.index', compact('usuarios'));
        }
        else {
            
            return view('admin.principal');
        }

    }

    public function adicionar()
    {
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        // dd($dados);

        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();

        Session::flash('mensagem', [
            'msg' => 'Usuario criado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.usuarios');
    }

    public function editar($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        $usuario = User::find($id);

        $dados = $request->all();

        if(isset($dados['password']) && strlen($dados['password']) >= 3 ){
            $dados['password'] = bcrypt($dados['password']);
        }
        else {
            unset($dados['password']);
        }

        $usuario->update($dados);

        Session::flash('mensagem', [
            'msg' => 'Usuario atualizado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.usuarios');
    }

    public function deletar($id)
    {
        User::find($id)->delete();

        Session::flash('mensagem', [
            'msg' => 'Usuario deletado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('admin.usuarios');
    }

    public function papel($id)
    {
        $usuario = User::find($id);
        $papel = Papel::all();

        return view('admin.usuarios.papel', compact('usuario', 'papel'));
    }

    public function salvarPapel(Request $request, $id)
    {
        $usuario = User::find($id);
        $papel = Papel::find($request->papel_id);

        $usuario->adicionaPapel($papel);

        return redirect()->back();
    }

    public function removerPapel($id, $papel_id)
    {
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);

        $usuario->removePapel($papel);

        return redirect()->back();
    }
}
