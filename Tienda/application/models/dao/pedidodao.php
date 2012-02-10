<?php

class Pedidodao extends CI_Model {
    public function save(Pedido $pedido) {
        $params = array(
            TABLE_PEDIDO_ENVIO => $pedido->getEnvio(),
            TABLE_PEDIDO_FECHA => $pedido->getFecha(),
            TABLE_PEDIDO_ID_CLIENTE => $pedido->getIdCliente(),
            TABLE_PEDIDO_ID_ESTATUS => $pedido->getIdEstatus(),
            "subtotal" => $pedido->getSubtotal(),
            "descuento" => $pedido->getDescuento(),
            TABLE_PEDIDO_TOTAL => $pedido->getTotal()
        );
        if($pedido->getIdPedido() == null){
            $this->db->insert(TABLE_PEDIDO, $params);
        } else {
            $this->db->where(TABLE_PEDIDO_ID_PEDIDO, $pedido->getIdPedido());
            $this->db->update(TABLE_PEDIDO, $params);
        }
        
    }
    
    public function countByParameters($idPedido, $idCliente, $idEstatus, $fecha) {
        return count($this->searchPedidoByParameters($idPedido, $idCliente, $idEstatus, $fecha));
    }
    
    public function searchPedidoByParameters($idPedido = null, $idCliente = null, $idEstatus = null, $fecha = null, $orderBy = "idPedido", $order = "ASC", $limit = 20, $offset = 0) {
        $this->db->join("estatus AS e", "e.idEstatus = p.idEstatus", "Inner");
        $this->db->join("cliente AS c", "c.idCliente = p.idCliente", "Inner");
        $this->db->select("
            p.idPedido AS idPedido,
            p.idCliente AS idCliente,
            p.fecha AS fecha,
            e.nombre AS idEstatus,
            p.envio AS envio,
            p.subtotal AS subtotal,
            p.descuento AS descuento,
            p.total AS total,
            CONCAT_WS(' ', c.nombre, c.apPaterno, c.apMaterno) AS nombreCliente
        ", false);
        $this->db->order_by($orderBy, $order);
        
        if($idPedido != null && filter_var($idPedido, FILTER_VALIDATE_INT)) {
            $this->db->where("p.idPedido", $idPedido);
        }
        
        if($idCliente != null && filter_var($idCliente, FILTER_VALIDATE_INT)) {
            $this->db->where("p.idCliente", $idCliente);
        }
        
        if($idEstatus != null && filter_var($idEstatus, FILTER_VALIDATE_INT)) {
            $this->db->where("p.idEstatus", $idEstatus);
        }
        
        if($fecha != null) {
            $this->db->like("p.fecha", $fecha, LIKE_AFTER);
        }
        
        $query = $this->db->get("pedido AS p", $limit, $offset);
        
        return $query->result();
    }
    
    public function loadProductosByPedido($idPedido) {
        $this->db->join("producto AS pr", "pp.idProducto = pr.idProducto", "INNER");
        $this->db->join("talla AS t", "pp.idTalla = t.idTalla", "INNER");
        $this->db->join("color AS c", "pp.idColor = c.idColor", "INNER");
        $this->db->join("subcategoria AS s", "pr.idSubcategoria = s.idSubcategoria", "INNER");
        $this->db->where(TABLE_PEDIDO_PRODUCTO_ID_PEDIDO, $idPedido);
        $this->db->select("
            pr.modelo AS producto,
            s.nombre AS subcategoria,
            c.nombre AS color,
            t.talla AS talla,
            pp.precio AS precio,
            pp.cantidad AS cantidad,
            pp.subtotal AS subtotal
        ", false);
        $query = $this->db->get("pedido_producto AS pp");
        return $query->result();
    }
    
    public function delete($idPedido) {
        $this->db->where(TABLE_PEDIDO_ID_PEDIDO, $idPedido);
        $this->db->delete(TABLE_PEDIDO);
    }
    
    public function getById($idPedido) {
        $this->db->where(TABLE_PEDIDO_ID_PEDIDO, $idPedido);
        $query = $this->db->get(TABLE_PEDIDO);
        $pedidos = $this->_getResult($query->result());
        if(count($pedidos) > 0) {
            return $pedidos[0];
        } else {
            return null;
        }
    }
    
    private function _getResult($result) {
        $pedidos = array();
        foreach($result as $key => $row) {
            $pedidos[$key] = new Pedido($row->idPedido, $row->fecha, $row->idCliente, $row->idEstatus, $row->envio, $row->total, $row->subtotal, $row->descuento);
        }
        return $pedidos;
    }
}

?>
