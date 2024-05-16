<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model
{
    protected $table            = 'noticias';
    protected $primaryKey       = 'nombreUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre_usuario', 'titulo', 'descripcion', 'fecha_creacion', 'fecha_correccion', 'fecha_publicacion', 'estado', 'categoria', 'imagen'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = '';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';
    public function insertar($data) {
        
        $this -> db -> table('noticias')-> insertBatch($data);

    }
    public function mostrar_todo(){
        $Noticias = $this->db->table('noticias');
        return $Noticias->get()->getResultArray();
        //$query = $this->db->get('nombre_de_la_tabla');
        // return $query->result();
    }
    public function mostrar_usuario($data){
        $Noticias = $this->db->table('noticias');
        $Noticias->where($data);
        return $Noticias->get()->getResultArray();
    }
    public function mostrar_noticia($id){
        
            $Noticias = $this->db->table('noticias');
            $Noticias->where($id);
            return $Noticias->get()->getResultArray();
        
    }
}