<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Noticias extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT', 
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre_usuario'=>[
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'titulo' =>[
                'type' => 'VARCHAR', 
                'constraint' => 50,
            ],
            'descripcion' =>[
                'type' => 'LONGTEXT', 
                'null' => true,
            ],
            'fecha' =>[
                'type' => 'DATE', 
            ],
            'estado' =>[
                'type' => 'VARCHAR', 
                'constraint' => 10,
            ],
            'categoria' =>[
                'type' => 'VARCHAR', 
                'constraint' => 100,
            ],
            'imagen' =>[
                'type' => 'FILE', 
            ],

        ]);
        $this -> forge -> addKey('id', true);
        $this -> forge -> addForeignKey('nombre_usuario', 'usuarios', 'nombreUsuario');
        $this -> forge ->createTable('noticias');
    }

    public function down()
    {
        $this->forge->dropTable('noticias');
        
    }
}
