<?php

class CartService extends CI_Model {

    private $pedidoDao;
    private $pedido_productoDao;
    private $descuentoDao;
    private $clienteDao;

    public function __construct() {
        parent::__construct();
        $this->pedidoDao = new Pedidodao();
        $this->pedido_productoDao = new Pedido_ProductoDao();
        $this->descuentoDao = new DescuentoDao();
        $this->clienteDao = new ClienteDao();
    }

    public function addProducto($idProducto, $cantidad, $descripcion, $precio, $nombre, $talla, $color, $idColor, $idTalla, $imagen) {
        $image_properties = array(
            "src" => $imagen,
            "width" => "50",
            "height" => "50",
            "class" => ""
        );

        $image_properties2 = array(
            "src" => $imagen,
            "width" => "60",
            "height" => "60",
        );

        $imagenChica = img($image_properties);
        $imagen = img($image_properties2);

        $producto = array();
        $producto["id"] = $idProducto;
        $producto["qty"] = $cantidad;
        $producto["price"] = $precio;
        $producto["name"] = $nombre;
        $producto["options"] = array(
            "descripcion" => $descripcion,
            "talla" => $talla,
            "color" => $color,
            "idColor" => $idColor,
            "idTalla" => $idTalla,
            "imagen" => $imagenChica,
            "imagenGrande" => $imagen
        );
        $this->cart->insert($producto);
    }

    public function getContenido() {
        return $this->cart->contents();
    }

    public function removeProducto($rowid) {
        $producto["rowid"] = $rowid;
        $producto["qty"] = 0;
        $this->cart->update($producto);
    }

    public function updateProducto($rowid, $cantidad) {
        $producto["rowid"] = $rowid;
        $producto["qty"] = $cantidad;
        $this->cart->update($producto);
    }

    public function process() {
        $contenido = $this->getContenido();

        $subtotal = 0;
        foreach($contenido as $key => $producto) {
            $subtotal += $producto["price"] * $producto["qty"];
        }
        $descuento = $this->descuentoDao->getDescuetoMonto($subtotal);
        $descuentoPorcentaje = $descuento->getPorcentaje();

        $iva = $subtotal * .16;

        $total = $subtotal - ($subtotal * ($descuentoPorcentaje / 100)) + $iva;
        $pedido = new Pedido(null, date("Y-m-d H:i:s"), $this->session->userdata("idCliente"), 1, COSTO_ENVIO, $total, $subtotal, $descuentoPorcentaje);
        $this->pedidoDao->save($pedido);
        $idPedido = $this->db->insert_id();
        foreach ($contenido as $key => $producto) {
            $subtotal = $producto["price"] * $producto["qty"];
            $pedido_producto = new Pedido_Producto($idPedido, $producto["id"], $producto["options"]["idColor"], $producto["options"]["idTalla"], $producto["price"], $producto["qty"], $subtotal);
            $this->pedido_productoDao->save($pedido_producto);
        }

        $vars["pedido"] = $this->db->insert_id();
        $vars["cliente"] = $this->clienteDao->getById($this->session->userdata("idCliente"));
        $vars["productos"] = $this->getContenido();
        $vars["subtotal"] = $subtotal;
        $vars["iva"] = $iva;
        $vars["descuento"] = $descuento->getPorcentaje();

        $correo = $this->load->view(VIEW_CARRITO_EMAIL, $vars, true);
        //echo $correo;
        $config = array();
        $config["mailtype"] = "html";
        $this->email->initialize($config);
        $this->email->from(ADMIN_CORREO, ADMIN_CORREO);
        $this->email->to($this->session->userdata("login"));
        $this->email->cc(COPIA_CORREO);
        $this->email->subject('Se ha registrado su pedido');
        $this->email->message($correo);
        $this->email->send();

        $this->cart->destroy();
    }

}

?>