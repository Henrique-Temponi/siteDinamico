<?php

use App\User;
use Illuminate\Database\Seeder;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = "Dev";
        $usuario->email = "dev@dev.com";
        $usuario->password = bcrypt("1234");
        $usuario->save();
    }
}
