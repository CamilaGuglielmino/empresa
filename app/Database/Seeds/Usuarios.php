<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {
        $data =[
            [
                'nombreUsuario' => 'camila',
                'contraseña' => '1234',
                'tipo_usuario' => 'Editor',
            ],
            [
                'nombreUsuario' => 'sofia',
                'contraseña' => '4567',
                'tipo_usuario' => 'Publicador',
            ],
            [
                'nombreUsuario' => 'nicolas',
                'contraseña' => '6789',
                'tipo_usuario' => 'Ambos',
            ],      

        ];
        
        $this -> db -> table('usuarios')-> insertBatch($data);
    }
}
