<?php
namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\NoticiasModel;

use CodeIgniter\I18n\Time;



class Noticias extends BaseController
{
    public function index()
    {
        $Noticias = new NoticiasModel();
       
        $data['registros'] = $Noticias->ordenar();
        $mensaje = session('mensaje');

        $vistas = view('header') . view('inicio', $data) . view('footer');
        return $vistas;

    }

    public function login()
    {

        $vistas = view('header') . view('login') . view('footer');
        return $vistas;
    }
    public function iniciar_sesion()
    {

        //var_dump('nombreUsuario', 'contraseña',);

        $usuario = $this->request->getPost('nombreUsuario');
        var_dump($usuario);

        $contraseña = $this->request->getPost('contraseña');
        var_dump($contraseña);

        $Usuario = new UsuariosModel();
        $datoUsuario = $Usuario->obtenerUsuario(['nombreUsuario' => $usuario]);
        if (!empty($datoUsuario)) {
            $contraBD = $datoUsuario[0]['contraseña'];


            if (strcasecmp($contraBD, $contraseña) == 0) {
                var_dump($contraBD);

                $data = [
                    'nombreUsuario' => $datoUsuario[0]['nombreUsuario'],
                    'tipo_usuario' => $datoUsuario[0]['tipo_usuario']
                ];
                $session = session();
                $session->set($data);
                $this->session->setFlashdata('success_message', '¡Inicio de sesión exitoso!');
                return redirect()->to(base_url('/'))->with('mensaje', '1');

            }
        } else {

            $this->session->setFlashdata('error_message', 'Credenciales incorrectas');

            return redirect()->to(base_url('/login'))->with('mensaje', '0');


        }
    }
    public function logout()
    {
        // Obtener la instancia de la sesión
        $session = \Config\Services::session();

        // Destruir la sesión
        $session->destroy();

        // Redireccionar al usuario a la página de inicio de sesión o a la página principal
        return redirect()->to(base_url('/'));
    }
    public function nuevo()
    {
        $vistas = view('header') . view('nuevo') . view('footer');
        return $vistas;
    }
    public function new()
    {
        $imagen = $this->request->getFile('imagen');

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            // Asegúrate de que la carpeta 'uploads' exista en la ruta especificada y tenga los permisos adecuados
            $rutaDestino = FCPATH . 'imagenes';
            $newName = $imagen->getRandomName(); // Genera un nuevo nombre para evitar conflictos
            $imagen->move($rutaDestino, $newName);
            // Verifica si el archivo se movió correctamente
            if ($imagen->hasMoved()) {
                // El archivo se movió correctamente
                echo "Archivo guardado en: " . $rutaDestino . $newName;
                $imagen = $newName;

            } else {
                // El archivo no se movió, maneja el error aquí
                echo "Error al mover el archivo.";
            }

        }
        $fechaActual = Time::now();
        $fechaFormateada = $fechaActual->toLocalizedString('yyyy-MM-dd');

        $id_usuario = session('nombreUsuario');
        var_dump($id_usuario);

        $data = [
            'id' => rand(10000, 59999), // 
            'nombre_usuario' => $id_usuario,
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha_creacion' => $fechaFormateada,
            'estado' => $this->request->getPost('estado'),
            'categoria' => $this->request->getPost('categoria'),
            'imagen' => $imagen
        ];
        $Noticias = new NoticiasModel();
        $Noticias->insertar($data);
        return redirect()->to(base_url('/'));
    }
    public function historial()
    {
        $Noticias = new NoticiasModel();

        $data['registros'] = $Noticias->mostrar_todo();

        $vistas = view('header') . view('historial', $data) . view('footer');
        return $vistas;
    }
    public function editar()
    {
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();
        $dato['dato'] = $Noticias->mostrar_noticia(['id' => $id]);

        // var_dump($dato);
        $vistas = view('header') . view('editar', $dato) . view('footer');
        return $vistas;
    }
    public function actualizar()
    {
        $imagen = $this->request->getFile('imagen');

        if ($imagen->isValid() && !$imagen->hasMoved()) {
            // Asegúrate de que la carpeta 'uploads' exista en la ruta especificada y tenga los permisos adecuados
            $rutaDestino = WRITEPATH . 'uploads';
            $newName = $imagen->getRandomName(); // Genera un nuevo nombre para evitar conflictos
            $imagen->move($rutaDestino, $newName);


            // Verifica si el archivo se movió correctamente
            if ($imagen->hasMoved()) {
                // El archivo se movió correctamente
                echo "Archivo guardado en: " . $rutaDestino . $newName;
                $imagen = $newName;
            } else {
                // El archivo no se movió, maneja el error aquí
                echo "Error al mover el archivo.";
            }
        }

        $fechaActual = Time::now();
        $fechaFormateada = $fechaActual->toLocalizedString('yyyy-MM-dd');

        $id_usuario = session('nombreUsuario');
        var_dump($id_usuario);

        $data = [
            'id' => rand(10000, 99999),
            'nombre_usuario' => $id_usuario,
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha_creacion' => $fechaFormateada,
            'estado' => $this->request->getPost('estado'),
            'categoria' => $this->request->getPost('categoria'),
            'imagen' => $imagen
        ];


        $Noticias = new NoticiasModel();
        $Noticias->insertar($data);
        return redirect()->to(base_url('/'));

    }
    public function categoria()
    {
        $var = $_GET['var'];
        $Noticias = new NoticiasModel();

        $var1 = 'Innovaciones y Lanzamientos';
        $var2 = 'Tendencias del Sector';
        $var3 = 'Casos de Éxito';
        $var4 = 'Eventos y Conferencias';

        if (strcasecmp($var, $var1) == 0) {
            $data['registros'] = $Noticias->mostrar_categoria(['categoria' => $var]);
            $vistas = view('header') . view('categorias', $data) . view('footer');
            return $vistas;
        } elseif (strcasecmp($var, $var2) == 0) {
            $data['registros'] = $Noticias->mostrar_categoria(['categoria' => $var]);
            $vistas = view('header') . view('categorias', $data) . view('footer');
            return $vistas;
        } elseif (strcasecmp($var, $var3) == 0) {
            $data['registros'] = $Noticias->mostrar_categoria(['categoria' => $var]);
            $vistas = view('header') . view('categorias', $data) . view('footer');
            return $vistas;
        } elseif (strcasecmp($var, $var4) == 0) {
            $data['registros'] = $Noticias->mostrar_categoria(['categoria' => $var]);
            $vistas = view('header') . view('categorias', $data) . view('footer');
            return $vistas;
        }

        //var_dump($var);      // 
    }
    public function detalle()
    {
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();
        $data['dato'] = $Noticias->mostrar_noticia(['id' => $id]);
        $vistas = view('header') . view('detalle', $data) . view('footer');
        return $vistas;

    }
    public function ver()
    {
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();
        $data['dato'] = $Noticias->mostrar_noticia(['id' => $id]);
        $vistas = view('header') . view('ver', $data) . view('footer');
        return $vistas;

    }
    public function descartar()
    {
        $id = $_GET['id'];
        var_dump($id);
        $Noticias = new NoticiasModel();
        // Obtener el 'builder' para la tabla deseada
        $builder = $Noticias->builder();

        // Realizar la actualización
        $builder->where('id', $id);
        $builder->set(['estado' => 'descartado']);
        $builder->update();
        return redirect()->to(base_url('/borradores'));

    }
    public function validar()
    {
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();
        $id_usuario = session('nombreUsuario');
        $fechaActual = Time::now();
        $fechaFormateada = $fechaActual->toLocalizedString('yyyy-MM-dd');
        // Obtener el 'builder' para la tabla deseada
        $builder = $Noticias->builder();
        // Realizar la actualización
        $builder->where('id', $id);
        $builder->set(['estado' => 'publicado']);
        $builder->set(['nombrePublicador' => $id_usuario]);
        $builder->set(['fecha_publicacion' => $fechaFormateada]);
        $builder->update();
        return redirect()->to(base_url('/validar'));   
    }
    public function corregir()
    {
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();


        // Obtener el 'builder' para la tabla deseada
        $builder = $Noticias->builder();

        // Realizar la actualización
        $builder->where('id', $id);
        $builder->set(['estado' => 'corregir']);
        $builder->update();

        return redirect()->to(base_url('/historial'));

    }
    public function borradores(){
        $Noticias = new NoticiasModel();
        $data['registros'] = $Noticias->mostrar_todo();
        $vistas = view('header') . view('borradores', $data) . view('footer');
        return $vistas;
    }
    public function vista(){
        $Noticias = new NoticiasModel();
        $data['registros'] = $Noticias->mostrar_todo();
        $vistas = view('header') . view('validar', $data) . view('footer');
        return $vistas;
    }
    public function borrador(){
        $id = $_GET['id'];
        var_dump($id);
        $Noticias = new NoticiasModel();
        $id_usuario = session('nombreUsuario');
        $fechaActual = Time::now();
        $fechaFormateada = $fechaActual->toLocalizedString('yyyy-MM-dd');
        // Obtener el 'builder' para la tabla deseada
        $builder = $Noticias->builder();

        // Realizar la actualización
        $builder->where('id', $id);
        $builder->set(['estado' => 'Borrador']);
        $builder->set(['nombreCorregir' => $id_usuario]);
        $builder->set(['fecha_correccion' => $fechaFormateada]);

        $builder->update();
        return redirect()->to(base_url('/validar'));
    }
    public function anular(){
        $id = $_GET['id'];
        var_dump($id);
        $Noticias = new NoticiasModel();
        // Obtener el 'builder' para la tabla deseada
        $builder = $Noticias->builder();

        // Realizar la actualización
        $builder->where('id', $id);
        $builder->set(['estado' => 'Anular']);
        $builder->update();
        return redirect()->to(base_url('/validar'));

    }


}
