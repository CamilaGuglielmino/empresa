<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Corregir extends Migration
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
        'id_noticia' =>[
            'type' => 'INT', 
            'constraint' => 5,
            'unsigned' => true,
            
        ],
        'nombre_usuario'=>[
            'type' => 'VARCHAR',
            'constraint' => '10',
        ],
        'fecha_correccion' =>[
            'type' => 'DATE',
            'null' => true,
        ],
        'estado' =>[
            'type' => 'VARCHAR', 
            'constraint' => 15,
        ],
    ]);
    $this -> forge -> addKey('id', true);
    $this -> forge -> addForeignKey('id_noticia', 'noticias', 'id');
    $this -> forge -> addForeignKey('nombre_usuario', 'usuarios', 'nombreUsuario');
    $this -> forge ->createTable('corregir');

    }

    public function down()
    {
        $this->forge->dropTable('corregir');

    }
}
