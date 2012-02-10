<?php

class EstatusService extends CI_Model{
    
    private $estatusDao;
    
    public function __construct() {
        parent::__construct();
        $this->estatusDao = new EstatusDao;
    }
    
    public function getAll() {
        return $this->estatusDao->getAll();
    }
}

?>
