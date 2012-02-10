<?php

class UsuarioService extends CI_Model {

    private $usuarioDao;

    public function __construct() {
        parent::__construct();
        $this->usuarioDao = new UsuarioDao();
    }

    public function authenticate($login, $password) {
        $usuario = $this->usuarioDao->getByLogin($login);
        if ($usuario != null) {
            if ($usuario->getPass() == md5($password)) {
                $response->estatus = 0;
                $response->mensaje = "Datos correctos";
                $this->session->set_userdata('adminLoginId', $usuario->getIdUsuario());
            } else {
                $response->estatus = 1;
                $response->mensaje = "Datos incorrectos";
            }
        } else {
            $response->estatus = 1;
            $response->mensaje = "Datos incorrectos";
        }
        return $response;
    }
    
    public function getById($idUsuario) {
        return $this->usuarioDao->getById($idUsuario);
    }
    
    public function save($login, $pass){
        $usuario = $this->usuarioDao->getById($this->session->userdata("adminLoginId"));
        $usuario->setLogin($login);
        if($usuario->getPass() != $pass){
            $usuario->setPass(md5($pass));
        }
        $this->usuarioDao->save($usuario);
        $response = new stdClass();
        $response->estatus = 1;
        $response->mensaje = "Datos guardados correctamente";
        return $response;
    }
}

?>
