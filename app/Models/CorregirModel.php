<?php

namespace App\Models;

use CodeIgniter\Model;

class CorregirModel extends Model
{
    protected $table            = 'corregir';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_noticia', 'titulo', 'descripcion', 'fecha_correccion', 'estado', 'categoria', 'imagen'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = '';
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';
    public function insertar($data)
    {

        $this->db->table('corregir')->insertBatch($data);

    }
    public function mostrar_noticia($id)
    {
        $Noticias = $this->db->table('corregir');
        $Noticias->where($id);
        return $Noticias->get()->getResultArray();
    }
}
