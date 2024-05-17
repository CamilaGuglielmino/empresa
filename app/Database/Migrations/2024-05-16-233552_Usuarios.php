<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type' => 'INT',
                'constraint' => '5',
                'unsigned'=> true,
            ],
            'nombreUsuario'=>[
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'contraseña'=>[
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'tipo_usuario'=>[
                'type' => 'VARCHAR',
                'constraint' => '10',             
            ],
        ]);
        $this-> forge->AddKey('nombreUsuario', true);
        $this-> forge->createTable('usuarios');

    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}