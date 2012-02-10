<?php

class Pedido_ProductoDao extends CI_Model {
    
    public function save(Pedido_Producto $pedido_producto) {
        $params = array(
            TABLE_PEDIDO_PRODUCTO_CANTIDAD => $pedido_producto->getCantidad(),
            TABLE_PEDIDO_PRODUCTO_ID_COLOR => $pedido_producto->getIdColor(),
            TABLE_PEDIDO_PRODUCTO_ID_PEDIDO => $pedido_producto->getIdPedido(),
            TABLE_PEDIDO_PRODUCTO_ID_PRODUCTO => $pedido_producto->getIdProducto(),
            TABLE_PEDIDO_PRODUCTO_ID_TALLA => $pedido_producto->getIdTalla(),
            TABLE_PEDIDO_PRODUCTO_PRECIO => $pedido_producto->getPrecio(),
            TABLE_PEDIDO_PRODUCTO_SUBTOTAL => $pedido_producto->getSubtotal()
        );
        $this->db->insert(TABLE_PEDIDO_PRODUCTO, $params);
    }
}

?>
