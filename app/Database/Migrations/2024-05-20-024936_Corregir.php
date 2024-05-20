<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Corregir extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type' => 'INT', 
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_noticia'=>[
                'type' => 'INT', 
                'constraint' => 5,
                'unsigned' => true,
            ],
            'titulo'=>[
                'type' => 'TINYTEXT', 
            ],
            'descripcion'=>[
                'type' => 'LONGTEXT', 
                'null' => true,
            ],
            'fecha_correccion'=>[
                'type' => 'DATE', 
            ],
            'estado'=>[
                'type' => 'VARCHAR', 
                'constraint' => 15,
            ],
            'categoria'=>[
                'type' => 'VARCHAR', 
                'constraint' => 100,
            ],
            'imagen'=>[
                'type' => 'VARCHAR', 
                'constraint' => 100,
            ],
        ]);
        $this -> forge -> addKey('id', true);
        $this -> forge -> addForeignKey('id_noticia', 'noticias', 'id');
        $this -> forge ->createTable('corregir');
    }

    public function down()
    {
        $this->forge->dropTable('corregir');
        
    }
    
}
