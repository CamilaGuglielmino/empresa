<?php
namespace App\Controllers;
use App\Models\UsuariosModel;


class Noticias extends BaseController
{
    public function index()
    {
        $mensaje=session('mensaje');
        $vistas = view('header').view('inicio').view('footer');
        return $vistas;
    }
 
    public function show($id = null)
    {
        //
    }
    public function login (){

        $vistas = view('header').view('login').view('footer');
        return $vistas;
    }
    public function iniciar_sesion(){

        //var_dump('nombreUsuario', 'contraseña',);
        
        $usuario =$this->request->getPost('nombreUsuario');  
        var_dump($usuario);

        $contraseña = $this->request->getPost('contraseña');
        var_dump($contraseña);

        $Usuario = new UsuariosModel();
        $datoUsuario=$Usuario->obtenerUsuario(['nombreUsuario' =>$usuario]);
        $contraBD=$datoUsuario[0]['contraseña'];
        
        
        if(strcasecmp($contraBD, $contraseña) == 0){
        var_dump($contraBD);
            
            $data =[
                'nombreUsuario'=>$datoUsuario[0]['nombreUsuario'],
                'tipo_usuario' =>$datoUsuario[0]['tipo_usuario']
            ];
            $session =session();
            $session ->set($data);
            return redirect()->to(base_url('/'))->with('mensaje','1');
        
        }else{
        var_dump($contraBD);

           return redirect()->to(base_url('/login')) -> with('mensaje', '0');


        }
    }
    public function logout() {
        // Obtener la instancia de la sesión
        $session = \Config\Services::session();
    
        // Destruir la sesión
        $session->destroy();
    
        // Redireccionar al usuario a la página de inicio de sesión o a la página principal
        return redirect()->to(base_url('/'));
    }
    public function nuevo()
    {
        $vistas = view('header').view('nuevo').view('footer');
        return $vistas;
    }

    public function new()
    {
        //
    }

    public function create()
    {
        //
    }
  
    public function edit($id = null)
    {
        //
    }

   
    public function update($id = null)
    {
        //
    }
        public function delete($id = null)
    {
        //
    }
}
