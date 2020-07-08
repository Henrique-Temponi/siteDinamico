<?php

use App\Pagina;
use Illuminate\Database\Seeder;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo', '=', 'sobre')->count();

        if($existe) {
            $paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();
        }
        else {
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "A Empresa";
        $paginaSobre->descricao = "Descricao sobre a empresa.";
        $paginaSobre->texto = "Texto sobre a empresa";
        $paginaSobre->imagem = "site/img/modelo";
        $paginaSobre->tipo = "Sobre";
        $paginaSobre->save();
    }
}
