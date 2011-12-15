<?php

require_once dirname(__FILE__) . "/../interface/UsuarioDao.php";

/**
 * Implementacion de la interfaz usuarioDAO
 *
 * @author Victor
 */
class UsuarioDaoImpl extends CI_Model implements UsuarioDao {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Cuenta los usuarios que existen en la base de datos
     * 
     * @return Integer Numero de usuarios en la bd
     */
    public function countAll() {
        $query = $this->db->get(TABLE_USUARIO);
        return count($query->result());
    }
    
    /**
     * Cuenta los usuarios que se parecen al usuario que se envia, no funciona
     * para el id
     * 
     * @param Usuario $usuario Usuario que se usara como criterio de busqueda
     * @return Integer Numero de Usuarios que se encontraron
     */
    public function countByExample($usuario) {
        return count($this->searchByExample($usuario));
    }
    
    /**
     * Elimina un usuario de la base de datos
     * 
     * @param Integer $id Identificador del usuario
     */
    public function delete($id) {
        $this->db->where(TABLE_USUARIO_ID_USUARIO, $id);
        $this->db->delete(TABLE_USUARIO);
    }
    
    /**
     * Recupera a un usuario por id, returna null si no se encuentra resultado
     * 
     * @param Integer $id Identificador del usuario
     * @return Usuario Usuario encontrado o null si no existe
     */
    public function getById($id) {
       $this->db->where(TABLE_USUARIO_ID_USUARIO, $id);
       $query = $this->db->get(TABLE_USUARIO);
       $usuarios = $this->_getResult($query->result());
       
       if(count($usuarios) > 0){
           return $usuarios[0];
       } else {
           return null;
       }
    }
     /**
      * Recupera un usuario por el login
      * 
      * @param String $login Login del usuario
      * @return Usuario Usuario encontrado o null si no existe
      */
    public function getByLogin($login) {
       $this->db->where(TABLE_USUARIO_LOGIN, $login);
       $query = $this->db->get(TABLE_USUARIO);
       $usuarios = $this->_getResult($query->result());
       
       if(count($usuarios) > 0){
           return $usuarios[0];
       } else {
           return null;
       }
    }
    
    /**
     * Guarda un usuario si es nuevo, si ya existe lo actualiza
     * 
     * @param Usuario $usuario Usuario que se desea guardar
     */
    public function save($usuario) {
        $usuario;
        $params = array(
            TABLE_USUARIO_LOGIN => $usuario->getLogin(),
            TABLE_USUARIO_PASS => $usuario->getPass()
        );
        if($usuario->getIdUsuario() == null){
            $this->db->insert(TABLE_USUARIO, $params);
        } else {
            $this->db->where(TABLE_USUARIO_ID_USUARIO, $usuario->getIdUsuario());
            $this->db->update(TABLE_USUARIO, $params);
        }
    }
    
    /**
     * Retorna los usuarios que se parecen al usuario que se envia, no funciona
     * para el id
     * 
     * @param Usuario $usuario  Usuario que se usara como criterio de busqueda
     */
    public function searchByExample($usuario) {
        $this->db->like(TABLE_USUARIO_LOGIN, $usuario->getLogin(), LIKE_AFTER);
        $this->db->like(TABLE_USUARIO_PASS, $usuario->getPass(), LIKE_AFTER);
        $query = $this->db->get(TABLE_USUARIO);
        
        return $this->_getResult($query->result());
    }
    
    /**
     * Busca usuarios que se parescan al que se envia, los ordena por el campo
     * dado de la forma que se indique ya se asc o desc, se puede agregar un
     * limite y un offset
     * 
     * @param Usuario $usuario Usuario que se usara como criterio de busqueda
     * @param String $orderBy Campo por el cual se desea ordenar los resultados
     * @param String $order Orden en que se desea obtener los resultados
     * @param Integer $limit Limite de resultados que se desea obtener
     * @param Integer $start Apartir de que registro se debe comenzar
     * @return array El array de usuarios encontrados
     */
    public function searchByExamplePaged($usuario, $orderBy = "idUsuario", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like(TABLE_USUARIO_LOGIN, $usuario->getLogin(), LIKE_AFTER);
        $this->db->like(TABLE_USUARIO_LOGIN, $usuario->getPass(), LIKE_AFTER);
        $this->db->order_by($orderBy, $order);
        $query = $this->db->get(TABLE_USUARIO, $limit, $offset);
        
        return $this->_getResult($query->result());
    }
    
    /**
     * Recupera todos los usuarios que existen en la base de datos
     * 
     * @return array El array Usuarios encontrados
     */
    public function getAll() {
        $query = $this->db->get(TABLE_USUARIO);
        return $this->_getResult($query->result());
    }
    
    /**
     * Este metodo es usado para transformar el resultado a un arreglo de
     * Usuario
     * 
     * @param Object $result Resultado de un query
     * @return array Un array de Usuarios
     */
    private function _getResult($result){
        $usuarios = array();
        foreach($result as $key => $row){
            $usuarios[$key] = new Usuario($row->idUsuario, 
                                          $row->login, 
                                          $row->pass);
        }
        return $usuarios;
    }

}