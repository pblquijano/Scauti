<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CreareUserSeeder extends Seeder {

    public function run()
    {
        User::create(array(
            'username' => 'rootgv',
            'password' =>  Hash::make('gveltium1.'),
            'nombres' => 'Pablo Antonio',
            'apellido_p' => 'Quijano',
            'apellido_m' => 'villamil',
            'celular' => '9811098995',
            'email' => 'pquijano@grupoveltium.com',
            'sexo' => '1',
            'tipo' => '0',
            'activo' => '1'
        ));
        
    }

}