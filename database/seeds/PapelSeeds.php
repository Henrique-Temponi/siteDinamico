<?php

use App\Papel;
use Illuminate\Database\Seeder;

class PapelSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Papel::where('nome', '=', 'admin')->count()) {
            $admin = Papel::create([
                'nome' => 'admin',
                'descricao' => 'administrador'
            ]);
        }
        if (!Papel::where('nome', '=', 'gerente')->count()) {
            $admin = Papel::create([
                'nome' => 'gerente',
                'descricao' => 'gerente'
            ]);
        }
        if (!Papel::where('nome', '=', 'vendedor')->count()) {
            $admin = Papel::create([
                'nome' => 'vendedor',
                'descricao' => 'vendedor'
            ]);
        }
    }
}
