<?php
namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\NoticiasModel;
use App\Models\CorregirModel;

use CodeIgniter\Events\Events;
use CodeIgniter\I18n\Time;



class Noticias extends BaseController
{
    public function index()
    {
        $Noticias = new NoticiasModel();

        $data['registros'] = $Noticias->ordenar();
        $mensaje = session('mensaje');
        Events::trigger('publicacion_programada');
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
        //  var_dump($usuario);

        $contraseña = $this->request->getPost('contraseña');
        //  var_dump($contraseña);

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


            } else {

                $this->session->setFlashdata('error_message', 'Credenciales incorrectas');

                return redirect()->to(base_url('/login'))->with('mensaje', '0');


            }
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
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
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

        $this->session->setFlashdata('success', 'Se creo exitosamente');

        return redirect()->to(base_url('/'));
    }
    public function historial()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {

            return redirect()->to(base_url('/login'));
        }
        $Noticias = new NoticiasModel();

        $data['registros'] = $Noticias->mostrar_todo();

        $vistas = view('header') . view('historial', $data) . view('footer');
        return $vistas;
    }
    public function editar()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();
        $dato['dato'] = $Noticias->mostrar_noticia(['id' => $id]);

        // var_dump($dato);
        $vistas = view('header') . view('editar', $dato) . view('footer');
        return $vistas;

    }
    public function actualizar()
    {

        $id = $_GET['id'];

        $fechaActual = Time::now();
        $fechaFormateada = $fechaActual->toLocalizedString('yyyy-MM-dd');
        $id_usuario = session('nombreUsuario');
        $estado = $this->request->getPost('estado');
        if (strcasecmp($estado, 'Validar') == 0) {
            $Noticias = new NoticiasModel();
          
            $builder = $Noticias->builder();
             // Realizar la actualización
            $builder->where('id', $id);
            $builder->set([ 'titulo' => $this->request->getPost('titulo')]);
            $builder->set(['descripcion' => $this->request->getPost('descripcion')]);
            $builder->set(['fecha_correccion' => $fechaFormateada]);
            $builder->set(['estado' => $this->request->getPost('estado')]);
            $builder->set(['categoria' => $this->request->getPost('categoria')]);
            $builder->set(['imagen' => $this->request->getFile('imagen')]);
            $builder->set(['nombreCorregir' =>$id_usuario]);


            $builder->update();
            
        } else {

            if (!empty($imagen)) {
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

                $data = [
                    'id' => rand(10000, 99999),
                    'id_noticia' => $id,
                    'titulo' => $this->request->getPost('titulo'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'fecha_correccion' => $fechaFormateada,
                    'estado' => $this->request->getPost('estado'),
                    'categoria' => $this->request->getPost('categoria'),
                    'imagen' => $imagen,
                ];
            } else {
                $data = [
                    'id' => rand(10000, 99999),
                    'id_noticia' => $id,
                    'titulo' => $this->request->getPost('titulo'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'fecha_correccion' => $fechaFormateada,
                    'estado' => $this->request->getPost('estado'),
                    'categoria' => $this->request->getPost('categoria'),
                    'imagen' => $this->request->getFile('imagen'),

                ];
            }
            $Corregir = new CorregirModel();
            $Corregir->insertar($data);


        }

        return redirect()->to(base_url('/borradores'));

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
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login
            return redirect()->to(base_url('/login'));
        }
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
    public function borradores()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
        $Noticias = new NoticiasModel();
        $data['registros'] = $Noticias->mostrar_todo();
        $vistas = view('header') . view('borradores', $data) . view('footer');
        return $vistas;
    }
    public function vista()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login
            return redirect()->to(base_url('/login'));
        }
        $Noticias = new NoticiasModel();
        $data['registros'] = $Noticias->mostrar_todo();
        $vistas = view('header') . view('validar', $data) . view('footer');
        return $vistas;
    }
    public function borrador()
    {
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
    public function anular()
    {
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
    public static function verificarFechaPublicacion()
    {
        $Noticias = new NoticiasModel();
        $fechaActual = Time::now();
        $fechaConCincoDiasMenos = $fechaActual->subDays(5);
        $fechaFormateada = $fechaConCincoDiasMenos->toLocalizedString('yyyy-MM-dd');
        $fechaHoy = $fechaActual->toLocalizedString('yyyy-MM-dd');



        // // Obtén las publicaciones pendientes
        $publicacionesPendientes = $Noticias->where('estado', 'validar')->findAll();

        foreach ($publicacionesPendientes as $publicacion):
            if ($publicacion['fecha_creacion'] < $fechaFormateada) {
                // Cambia el estado a "publicar"
                $id = $publicacion['id'];
                $builder = $Noticias->builder();

                $builder->where('id', $id);
                $builder->set(['fecha_publicacion' => $fechaHoy]);
                $builder->set(['estado' => 'publicado']);
                $builder->set(['estado' => 'publicado']);
                $builder->set(['estado1' => 'automaticamente']);
                $builder->update();

            }

        endforeach;

    }
    public function automatico()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
        $Noticias = new NoticiasModel();

        $data['registros'] = $Noticias->mostrar_todo();
        $vistas = view('header') . view('automatico', $data) . view('footer');
        return $vistas;
    }
    public function despublicar()
    {
        $id = $_GET['id'];
        var_dump($id);
        $Noticias = new NoticiasModel();

        // Obtener el 'builder' para la tabla deseada
        $builder = $Noticias->builder();

        // Realizar la actualización
        $builder->where('id', $id);
        $builder->set(['estado' => 'Borrador']);
        $builder->set(['estado1' => 'Despublicada']);

        $builder->update();
        return redirect()->to(base_url('/automatico'));
    }
    public function deshacerCambios()
    {
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();

        // Verifica si hay datos originales en la sesión
        if ($this->session->has('datos_originales')) {
            $datosOriginales = $this->session->get('datos_originales');

            $builder = $Noticias->builder();

            $builder->where('id', $id);

            $builder->update($id, $datosOriginales);

            // Limpia la sesión
            $this->session->remove('datos_originales');
        }

    }
    public function publicada()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
        $Noticias = new NoticiasModel();

        $data['registros'] = $Noticias->mostrar_todo();
        $vistas = view('header') . view('publicadas', $data) . view('footer');
        return $vistas;
    }
    public function cambios()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
        $id = $_GET['id'];
        $Noticias = new NoticiasModel();
        $Correccion = new CorregirModel();
        $dato['correcciones'] = $Correccion->mostrar_noticia(['id_noticia' => $id]);
        $data['registros'] = $Noticias->mostrar_noticia(['id' => $id]);
        $dataCompleto = array_merge($data, $dato);
        $vistas = view('header') . view('cambios', $dataCompleto) . view('footer');
        return $vistas;
    }
    public function descartadas()
    {
        $session = \Config\Services::session();

        if (!$usuario = $session->get('nombreUsuario')) {
            // Si no hay sesión, redirige al login

            return redirect()->to(base_url('/login'));
        }
        $Noticias = new NoticiasModel();
        $data['registros'] = $Noticias->mostrar_todo();

        $vistas = view('header') . view('descartadas', $data) . view('footer');
        return $vistas;

    }
    public function antiguas()
    {
        $Noticias = new NoticiasModel();

        $data['registros'] = $Noticias->ordenar();
        $vistas = view('header') . view('antiguas', $data) . view('footer');
        return $vistas;
    }

}