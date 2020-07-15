<?php

use App\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Permissao::where('nome', '=', 'usuario_listar')->count()){
            Permissao::create([
                'nome' => 'usuario_listar',
                'descricao' => 'Listar usuarios'
            ]);
        }
        else {
            $permissao = Permissao::where('nome', '=', 'usuario_listar')->first();
            $permissao->update([
                'nome' => 'usuario_listar',
                'descricao' => 'Listar usuarios'
            ]);
        }

        if(!Permissao::where('nome', '=', 'usuario_adicionar')->count()){
            Permissao::create([
                'nome' => 'usuario_adicionar',
                'descricao' => 'adicionar usuarios'
            ]);
        }
        else {
            $permissao = Permissao::where('nome', '=', 'usuario_adicionar')->first();
            $permissao->update([
                'nome' => 'usuario_adicionar',
                'descricao' => 'adicionar usuarios'
            ]);
        }

        if(!Permissao::where('nome', '=', 'usuario_editar')->count()){
            Permissao::create([
                'nome' => 'usuario_editar',
                'descricao' => 'Editar usuarios'
            ]);
        }
        else {
            $permissao = Permissao::where('nome', '=', 'usuario_editar')->first();
            $permissao->update([
                'nome' => 'usuario_editar',
                'descricao' => 'Editar usuarios'
            ]);
        }

        if(!Permissao::where('nome', '=', 'usuario_deletar')->count()){
            Permissao::create([
                'nome' => 'usuario_deletar',
                'descricao' => 'deletar usuarios'
            ]);
        }
        else {
            $permissao = Permissao::where('nome', '=', 'usuario_deletar')->first();
            $permissao->update([
                'nome' => 'usuario_deletar',
                'descricao' => 'deletar usuarios'
            ]);
        }
    }
}
