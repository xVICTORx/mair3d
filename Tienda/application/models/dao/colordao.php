<?php

/**
 *
 * @author Victor
 */
class ColorDao extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Cuenta todos los colores que existen en la base de datos
     * 
     * @return Integer Numero de colores en la bd
     */
    public function countAll() {
        $query = $this->db->get(TABLE_COLOR);
        return count($query->result());
    }
    
    /**
     * Cuenta el numero de registros parecidos al que se envia
     * 
     * @param Color $color Se usara como criterio para contar los parecidos
     * @return Integer Numero de colores encontrados 
     */
    public function countByExample($color) {
        return count($this->searchByExample($color));
    }
    
    /**
     * Elimina un color por su identificador
     *
     * @param Integer $id Identificador del color que se desea borrar
     */
    public function delete($id) {
        $this->db->where(TABLE_COLOR_ID_COLOR , $id);
        $this->db->delete(TABLE_COLOR);
    }
    
    /**
     * Recupera todos los colores dados de alta en la bd
     * 
     * @return array Contiene todos los colores que existen en la bd
     */
    public function getAll() {
        $query = $this->db->get(TABLE_COLOR);
        return $this->_getResult($query->result());
    }
    
    /**
     * Recupera un color por su id
     * 
     * @param Integer $id Recupera un color por su id
     * @return Color El color encontrado en caso de no existir retorna null
     */
    public function getById($id) {
        $this->db->where(TABLE_COLOR_ID_COLOR, $id);
        $query = $this->db->get(TABLE_COLOR);
        $result = $this->_getResult($query->result());
        if(count($result) > 0){
            return $result[0];
        } else {
            return null;
        }
    }
    
    /**
     * Guarda un color dado si no existe lo crea y si ya existe lo actualiza
     * 
     * @param Color $color Color que se desea guardar
     */
    public function save($color) {
        $params = array(
            TABLE_COLOR_DESCRIPCION => $color->getDescripcion(),
            TABLE_COLOR_IMAGEN => $color->getImagen(),
            TABLE_COLOR_NOMBRE => $color->getNombre(),
        );
        if($color->getIdColor() == null){
            $this->db->insert(TABLE_COLOR, $params);
        } else {
            $this->db->where(TABLE_COLOR_ID_COLOR, $color->getIdColor());
            $this->db->update(TABLE_COLOR, $params);
        }
    }
    
    /**
     * Busca Colores parecidos al que se envia
     * 
     * @param Color $color Color que se usara como criterio de busqueda
     */
    public function searchByExample($color) {
        $this->db->like(TABLE_COLOR_DESCRIPCION, $color->getDescripcion(), LIKE_AFTER);
        $this->db->like(TABLE_COLOR_NOMBRE, $color->getNombre(), LIKE_AFTER);
        $this->db->like(TABLE_COLOR_IMAGEN, $color->getImagen(), LIKE_AFTER);
        $query = $this->db->get(TABLE_COLOR);
        
        return $this->_getResult($query->result());
    }
    
    /**
     * Busca colores que se parescan al que se envia, los ordena por el campo
     * dado de la forma que se indique ya se asc o desc, se puede agregar un
     * limite y un offset
     * 
     * @param Color $color Color que se usara como criterio de busqueda
     * @param String $orderBy Campo por el cual se desea ordenar
     * @param String $order Tipo de orden que se desea (asc o desc)
     * @param Integer $limit Numero maximo de registros que se desea obtener
     * @param Integer $offset Apartir de que numero se desea comenzar a buscar
     * @return array de Color encontrados
     */
    
    public function searchByExamplePaged($color, $orderBy = "idColor", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like(TABLE_COLOR_DESCRIPCION, $color->getDescripcion(), LIKE_AFTER);
        $this->db->like(TABLE_COLOR_NOMBRE, $color->getNombre(), LIKE_AFTER);
        $this->db->like(TABLE_COLOR_IMAGEN, $color->getImagen(), LIKE_AFTER);
        $this->db->order_by($orderBy, $order);
        $query = $this->db->get(TABLE_COLOR, $limit, $offset);
        
        return $this->_getResult($query->result());
    }
    
    /**
     * Este metodo es usado para transformar el resultado a un arreglo de
     * Color
     * 
     * @param Object $result Resultado de un query
     * @return array Un array de Color
     */
    private function _getResult($result) {
        $colores = array();
        foreach($result as $key => $row) {
            $colores[$key] = new Color($row->idColor, 
                                       $row->nombre, 
                                       $row->descripcion, 
                                       $row->imagen);
        }
        return $colores;
    }
    
}
