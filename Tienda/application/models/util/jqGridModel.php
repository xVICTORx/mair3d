<?php

/**
 * Clase jqGridModel es la estructura de datos que debe llevar una response para
 * los jqGrid
 *
 * @author Victor
 */
class jqGridModel {
    /**
     *
     * @var Integer Pagina actual del grid 
     */
    var $page;
    /**
     *
     * @var Integer Total de paginas 
     */
    var $total;
    /**
     *
     * @var Integer Total de registros en esta llamada 
     */
    var $records;
    /**
     *
     * @var Array Renglones del grid
     */
    var $rows;
    
    public function getPage() {
        return $this->page;
    }

    public function setPage($page) {
        $this->page = $page;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getRecords() {
        return $this->records;
    }

    public function setRecords($records) {
        $this->records = $records;
    }

    public function getRows() {
        return $this->rows;
    }

    public function setRows($rows) {
        $this->rows = $rows;
    }

}