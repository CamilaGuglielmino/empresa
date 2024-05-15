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
                'type' => 'TINYTEXT', 
                
            ],
            'descripcion' =>[
                'type' => 'LONGTEXT', 
                'null' => true,
            ],
            'fecha_creacion' =>[
                'type' => 'DATE', 
            ],
            'fecha_correccion' =>[
                'type' => 'DATE',
                'null' => true,
            ],
            'fecha_publicacion' =>[
                'type' => 'DATE', 
                'null' => true,
            ],
            'estado' =>[
                'type' => 'VARCHAR', 
                'constraint' => 15,
            ],
            // 'estado2' =>[
            //     'type' => 'VARCHAR', 
            //     'constraint' => 15,
            // ],
            'categoria' =>[
                'type' => 'VARCHAR', 
                'constraint' => 100,
            ],
            'imagen' =>[
                'type' => 'VARCHAR', 
                'constraint' => 100,
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
