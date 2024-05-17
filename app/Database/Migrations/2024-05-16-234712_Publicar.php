<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Publicar extends Migration
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
            'id_noticias' =>[
                'type' => 'INT', 
                'constraint' => 5,
                'unsigned' => true,
                
            ],
            'nombre_usuario'=>[
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'fecha_publicacion' =>[
                'type' => 'DATE',
                'null' => true,
            ],
            'estado' =>[
                'type' => 'VARCHAR', 
                'constraint' => 15,
            ],
        ]);
        $this -> forge -> addKey('id', true);
        $this -> forge -> addForeignKey('id_noticias', 'noticias', 'id');
        $this -> forge -> addForeignKey('nombre_usuario', 'usuarios', 'nombreUsuario');
        $this -> forge ->createTable('publicar');

    }

    public function down()
    {
        $this->forge->dropTable('publicar');
        
    }
}
