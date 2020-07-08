<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class PaginaController extends Controller
{
    public function sobre()
    {
        $pagina = Pagina::where('tipo', '=', 'Sobre')->first();
        // dd($pagina);

        return view('site.sobre', compact('pagina'));
    }

    public function contato()
    {
        $pagina = Pagina::where('tipo', '=', 'Contato')->first();
        // dd($pagina);
        return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request)
    {
        // dd($request);
        $pagina = Pagina::where('tipo', '=', 'Contato')->first();
        $email = $pagina->email;

        Mail::send('emails.contato', ['request' => $request] , function($m) use ($request,$email){
            $m->from($request['email'], $request['name']);
            $m->replyTo($request['email'], $request['name']);
            $m->to($email, 'Contato do site');
            $m->subject("Contato pelo site");
        });

        Session::flash('mensagem', [
            'msg' => 'Contato enviado com sucesso',
            'class' => 'green white-text'
        ]);

        return redirect()->route('site.contato');
    }
}
