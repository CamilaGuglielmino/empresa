<?php
namespace App\Controllers;
use App\Models\UsuariosModel;


class login extends BaseController
{
    public function index(){
        return view('login');

    }
    public function process(){
    
  

    //var_dump('nombreUsuario', 'contraseña',);

    $usuario =$this->request->getPost('nombreUsuario');
    var_dump($usuario);
    $contraseña = $this->request->getPost('contraseña');
    var_dump($contraseña);
  }
}

    
    /*
$contraseña = $this->request->getPost('contraseña');
$Usuario = new UsuariosModel();
$datoUsuario=$Usuario->obtenerUsuario(['nombreUsuario' =>$usuario]);
if(count($datoUsuario)>0 && password_verify($contraseña, $datoUsuario[0]['contraseña'])){
    
    $data =[
        'nombreUsuario'=>$datoUsuario[0]['nombreUsuario'],
        'tipo' =>$datoUsuario[0]['tipo']
    ];
    $session =session();
    $session ->set($data);
    return redirect()->to(base_url('/inicio'))->with('mensaje','1');
}else{
    return redirect()->to(base_url('/')) -> with('mensaje', '0');


}

    }
}*/