<?php

/**
 * Clase de servicio para los colores
 *
 * @author Victor
 */
class ColorService extends CI_Model {
    
    private $colorDAO;
    
    public function __construct() {
        parent::__construct();
        $this->colorDAO = new ColorDao;
    }
    
    /**
     * Cargar colores paginados
     * 
     * @param type $nombre
     * @param type $descripcion
     * @param type $orderBy
     * @param type $order
     * @param type $page
     * @param type $rows
     * @return jqGridModel 
     */
    public function loadColoresPaged($nombre, $descripcion, $orderBy, $order, $page, $rows) {
        $color = new Color();
        $color->setNombre($nombre);
        $color->setDescripcion($descripcion);
        
        $cuenta = $this->colorDAO->countByExample($color);
        
        $totalPages = $cuenta > 0? ceil($cuenta/$rows) : 0;
        $page = $page > $totalPages? $totalPages : $page;
        $offset = $rows*$page - $rows; 
        
        $colores = $this->colorDAO->searchByExamplePaged($color, $orderBy, $order, $rows, $offset);
        
        $gridRows = array();
        foreach($colores as $key => $color){
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $color->getIdColor();
            $gridRows[$key][TABLE_COLOR_NOMBRE] = $color->getNombre();
            $gridRows[$key][TABLE_COLOR_DESCRIPCION] = $color->getDescripcion();
            $gridRows[$key]["subirImagenColor"] = "";
            $gridRows[$key]["imagenColor"] = $color->getImagen();
            if($color->getImagen() != "" && filter_var($color->getImagen(), FILTER_VALIDATE_URL)){
                $image_properties = array(
                      "src" => $color->getImagen(),
                      "width" => "80",
                      "height" => "70",
                );
                $gridRows[$key]["imagenHtmlColor"] = img($image_properties);
            } else {
                $gridRows[$key]["imagenHtmlColor"] = "<strong>Imagen no disponible</strong>";
            }
            
        }
        
        $gridModel =  new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;
        
        return $gridModel;
    }
    
    /**
     * Guardar color ya se nuevo o existente
     * 
     * @param type $nombre
     * @param type $imagen
     * @param type $descripcion
     * @param type $idColor 
     */
    public function save($nombre, $imagen, $descripcion, $idColor = null){
        $color = new Color();
        $color->setDescripcion($descripcion);
        $color->setIdColor($idColor);
        $color->setImagen($imagen);
        $color->setNombre($nombre);
        $this->colorDAO->save($color);
    }
    
    /**
     * Borrar un color
     * 
     * @param type $idColor 
     */
    public function delete($idColor) {
        $this->colorDAO->delete($idColor);
    }
    
    public function getAll() {
        return $this->colorDAO->getAll();
    }
}

?>
