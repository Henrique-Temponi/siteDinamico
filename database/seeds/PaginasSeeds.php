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
        $existe = Pagina::where('tipo', '=', 'Sobre')->count();

        if($existe) {
            $paginaSobre = Pagina::where('tipo', '=', 'Sobre')->first();
        }
        else {
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "Titulo da empresa";
        $paginaSobre->descricao = "Descricao sobre a empresa.";
        $paginaSobre->texto = "Texto sobre a empresa";
        $paginaSobre->imagem = "site/img/modelo";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14028.694058704315!2d-81.4678193!3d28.4743207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1adc62268ae9b19!2sUniversal%20Orlando%20Resort!5e0!3m2!1spt-BR!2sbr!4v1594211516185!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
        $paginaSobre->tipo = "Sobre";
        $paginaSobre->save();
    }
}
