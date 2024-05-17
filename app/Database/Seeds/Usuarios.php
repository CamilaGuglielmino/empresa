<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuarios extends Seeder
{
    public function run()
    {
        $data =[
            [
                'id'=>'123',
                'nombreUsuario' => 'camila',
                'contraseña' => '1234',
                'tipo_usuario' => 'Editor',
            ],
            [
                'id'=>'456',
                'nombreUsuario' => 'sofia',
                'contraseña' => '4567',
                'tipo_usuario' => 'Publicador',
            ],
            [
                'id'=>'789',
                'nombreUsuario' => 'nicolas',
                'contraseña' => '6789',
                'tipo_usuario' => 'Ambos',
            ],      

        ];
        
        $this -> db -> table('usuarios')-> insertBatch($data);
    }
}