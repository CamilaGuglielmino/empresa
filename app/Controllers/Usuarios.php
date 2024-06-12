<?php
namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\NoticiasModel;
use App\Models\CorregirModel;

use CodeIgniter\Events\Events;
use CodeIgniter\I18n\Time;

class Usuarios extends BaseController{
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
}