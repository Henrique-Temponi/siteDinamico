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

        if(User::where('email', '=', 'dev@dev.com')->count()){
            $usuario = User::where('email', '=', 'dev@dev.com')->first();
            
            $usuario->name = "Dev";
            $usuario->email = "dev@dev.com";
            $usuario->password = bcrypt("1234");
            $usuario->save();
        }
        else {
            $usuario = new User();
            $usuario->name = "Dev";
            $usuario->email = "dev@dev.com";
            $usuario->password = bcrypt("1234");
            $usuario->save();
        }
    }
}
