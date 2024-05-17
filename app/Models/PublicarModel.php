<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicarModel extends Model
{
    protected $table = 'publicar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_noticias', 'nombre_usuario', 'fecha_publicacion', 'estado'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected array $casts = [];
    protected array $castHandlers = [];
    public function obtenerUsuario($data)
    {
        $Usuario = $this->db->table('publicar');
        $Usuario->where($data);
        return $Usuario->get()->getResultArray();
    }
    public function insertar($data) {
        
        $this -> db -> table('publicar')-> insertBatch($data);

    }
    public function show(){
        $Publicar = $this->db->table('publicar');
        return $Publicar->get()->getResultArray();
    }


}
