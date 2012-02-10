<?php

class PedidosService extends CI_Model {

    private $pedidoDao;

    public function __construct() {
        parent::__construct();
        $this->pedidoDao = new Pedidodao();
    }

    public function load($idPedido = null, $idCliente = null, $idEstatus = null, $fecha = null, $orderBy = "idPedido", $order = "ASC", $page = 1, $rows = 20) {
        $cuenta = $this->pedidoDao->countByParameters($idPedido, $idCliente, $idEstatus, $fecha);

        $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        $page = $page > $totalPages ? $totalPages : $page;
        $offset = $rows * $page - $rows;

        $pedidos = $this->pedidoDao->searchPedidoByParameters($idPedido, $idCliente, $idEstatus, $fecha, $orderBy, $order, $rows, $offset);
        $gridRows = array();
        foreach ($pedidos as $key => $pedido) {
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $pedido->idPedido;
            $gridRows[$key]["idEstatus"] = $pedido->idEstatus;
            $gridRows[$key]["idCliente"] = $pedido->nombreCliente;
            $gridRows[$key]["fecha"] = $pedido->fecha;
            $gridRows[$key]["descuento"] = $pedido->descuento;
            $gridRows[$key]["envio"] = $pedido->envio;
            $gridRows[$key]["subtotal"] = $pedido->subtotal;
            $gridRows[$key]["total"] = $pedido->total;
        }

        $gridModel = new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;

        return $gridModel;
    }

    public function loadProductosByPedido($idPedido) {
        $productos = $this->pedidoDao->loadProductosByPedido($idPedido);
        $response = new stdClass();
        $response->rows = array();
        foreach ($productos as $key => $producto) {
            $response->rows[$key] = new stdClass();
            $response->rows[$key]->id = $key;
            $response->rows[$key]->cell = array(
                $producto->producto,
                $producto->subcategoria,
                $producto->color,
                $producto->talla,
                $producto->precio,
                $producto->cantidad,
                $producto->subtotal
            );
        }
        return $response;
    }
    
    public function delete($idPedido) {
        $this->pedidoDao->delete($idPedido);
    }
    
    public function save($idPedido, $idEstatus) {
        $pedido = $this->pedidoDao->getById($idPedido);
        $pedido->setIdEstatus($idEstatus);
        $this->pedidoDao->save($pedido);
    }
    
    
}
