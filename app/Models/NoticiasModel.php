<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model
{
    protected $table = 'noticias';
    protected $primaryKey = 'nombreUsuario';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nombre_usuario', 'titulo', 'descripcion', 'fecha_creacion', 'estado', 'categoria', 'imagen'];

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

        $this->db->table('noticias')->insertBatch($data);

    }
    public function mostrar_todo()
    {
        $Noticias = $this->db->table('noticias');
        return $Noticias->get()->getResultArray();

    }
    public function mostrar_usuario($data)
    {
        $Noticias = $this->db->table('noticias');
        $Noticias->where($data);
        return $Noticias->get()->getResultArray();
    }
    public function mostrar_noticia($id)
    {
        $Noticias = $this->db->table('noticias');
        $Noticias->where($id);
        return $Noticias->get()->getResultArray();
    }
    public function mostrar_categoria($var)
    {
        $Noticias = $this->db->table('noticias');
        $Noticias->where($var);
        return $Noticias->get()->getResultArray();
    }
    public function ordenar()
    {
        $noticias = $this->db->table('noticias');
        $noticias->orderBy('fecha_publicacion', 'DESC'); // Ordenar por 'fecha_publicacion' en orden descendente
        $query = $noticias->get(); // Obtener los resultados de la consulta
        $noticias = $query->getResultArray(); // Convertir los resultados en un array asociativo

        return $noticias;

    }


}
