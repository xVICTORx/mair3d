<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE_ADMIN ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo base_url(CSS_JQUERY) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_JQGRID) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_CARRITO_WELCOME) ?>" type="text/css" rel="stylesheet"/>
        <link rel="shortcut icon" href="<?php echo base_url("/resources/imgs/favicon.ico")?>" />
        <script src="<?php echo base_url(JS_JQUERY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UI) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID_I18N) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_BLOCK) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UPLOAD) ?>" type="text/javascript"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>index.php";
        </script>
        <script src="<?php echo base_url(JS_CARRITO_WELCOME_READY) ?>" type="text/javascript"></script>
    </head>
    <body>
        <div id="header">
            <div id="socialHeader">
                <div id="linksHeader">
                    <?php echo anchor("https://www.facebook.com/profile.php?id=100002308096874&ref=ts", img(base_url("resources/imgs/facebook.png"))) ?>
                    &nbsp;&nbsp;
                    <?php echo anchor("https://www.facebook.com/profile.php?id=100002308096874&ref=ts", img(base_url("resources/imgs/twitter.png"))) ?>
                </div>
                <div id="infoHeader">
                    <br/>
                    Tel: (52) (55) 5761 8211, Fax: (52) (55) 5761 5521
                    <br/>
                    Doctor Valenzuela 67, Col. Doctores, México, D.F. C.P. 06720
                </div>
            </div>
            <div id="imgHeader">
                <?php echo img(base_url("resources/imgs/raklyn_header.png")) ?>
            </div>
            <div id="dataHeader">
                <h3 class="menuLinks ui-widget-header ui-corner-all">
                    <a href="#"><?php echo anchor(base_url(MODULE_PRODUCTOS), "Inicio") ?></a>
                    <a href="#"><?php echo anchor(base_url("quienes"), "Quienes somos") ?></a>
                    <a href="#"><?php echo anchor(base_url("ofertas"), "Promociones") ?></a>
                    <a href="#"><?php echo anchor(base_url(MODULE_PRODUCTOS), "Productos") ?></a>
                    <a href="#"><?php echo anchor(base_url("contacto"), "Contacto") ?></a>
                    <span style="float: right;">
                        <label for="buscador">Buscador: </label>
                        <input type="text" style="height: 10px; width: 150px; margin-top: -2px; padding: 4px;" class="ui-widget-content ui-corner-all" id="buscador" placeholder="Buscar un producto..."/>
                        <button id="buscar" style="height: 19px; margin-top: -2px; font-size: 9px;">Buscar</button>
                    </span>
                </h3>
            </div>
        </div>
        <div id="contenido">
            <div id="menu">
                <table id="treeMenu"></table>
            </div>
            <div id="modulo" class="ui-corner-all">
                <h3 class="tituloMediano ui-widget-header ui-corner-all">Carrito de compras</h3>
                <div class="gridProductoHeader">
                    <div class="gridImagenProducto">
                        <strong>Producto</strong>
                    </div>
                    <div class="gridDetalleProducto">
                        &nbsp;
                    </div>
                    <div class="gridPrecioProducto">
                        <strong>Precio unitario</strong>
                    </div>
                    <div class="gridCantidadProducto">
                        <strong>Cantidad</strong>
                    </div>
                    <div class="gridSubtotalProducto">
                        <strong>Subtotal</strong>
                    </div>
                    <div class="gridQuitarProducto">
                        <strong>Quitar</strong>
                    </div>
                </div>
                <?php $total = 0; ?>
                <?php foreach ($productos as $key => $producto): ?>
                    <div class="gridProducto">
                        <div class="gridImagenProducto">
                            <?php echo $producto["options"]["imagenGrande"]; ?>
                        </div>
                        <div class="gridDetalleProducto">
                            <p>
                                <strong><?php echo anchor(MODULE_PRODUCTOS_VER . $producto["id"], $producto["name"]) ?></strong>
                                <br/>
                                <strong>Color: </strong><?php echo $producto["options"]["color"] ?>
                                <strong>Talla: </strong><?php echo $producto["options"]["talla"] ?>
                            </p>
                        </div>
                        <div class="gridPrecioProducto">
                            <p>
                                <strong class="descuento">$<?php echo $producto["price"] ?></strong>
                            </p>
                        </div>
                        <div class="gridCantidadProducto">
                            <p>
                                <input type="text" onchange="updateProducto('<?php echo $producto["rowid"]; ?>')" class="qtySpinner" id="<?php echo $producto["rowid"]; ?>" value="<?php echo $producto["qty"] ?>" readonly="true" size="2"/>
                            </p>
                        </div>
                        <div class="gridSubtotalProducto">
                            <p>
                                <strong  class="precio">$<?php echo $producto["qty"] * $producto["price"] ?></strong>
                            </p>
                        </div>
                        <div class="gridQuitarProducto">
                            <p>
                                <button class="removeProducto" onclick="removeProducto('<?php echo $producto["rowid"]; ?>')">Quitar</button>
                            </p>
                        </div>
                    </div>
                    <?php $total += $producto["qty"] * $producto["price"]; ?>
                <?php endforeach; ?>
                <div class="gridProductoHeader">
                    <div class="gridImagenProducto">
                        &nbsp;
                    </div>
                    <div class="gridDetalleProducto">
                        &nbsp;
                    </div>
                    <div class="gridPrecioProducto">
                        &nbsp;
                    </div>
                    <div class="gridCantidadProducto">
                        &nbsp;
                    </div>
                    <div class="gridSubtotalProducto">
                        &nbsp;
                    </div>
                    <div class="gridQuitarProducto">
                        <table>
                            <tr>
                                <td style="text-align: left;"><strong>Subtotal:</strong></td>
                                <td style="text-align: right;"><strong  class="descuento">$<?php echo number_format($total,2) ?></strong></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;"><strong>I.V.A.:</strong></td>
                                <td style="text-align: right;"><strong  class="descuento">$<?php echo number_format($total * .16, 2) ?></strong></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;"><strong>Total:</strong></td>
                                <td style="text-align: right;"><strong  class="precio">$<?php echo number_format($total + $total * .16, 2) ?></strong></td>
                            </tr>
                        </table>
                        <button id="realizarPedido">Realizar pedido</button>
                    </div>
                </div>
            </div>
        </div>
        <div title="Pedido" id="pedido">

        </div>
        <div id="footer" class="textoChico">
            <h3 class="ui-widget-header ui-corner-all">
                Doctor Valenzuela 67, Col. Doctores, México, D.F. C.P. 06720.
                <br/>
                Tel: (52) (55) 5761 8211, Fax: (52) (55) 5761 5521, ventas@raklyn.com.mx
                <br/>
                Derechos Reservados Raklyn de México, S.A. de C.V. 2011 | Desarrollo por www.mair3d.com.mx
            </h3>
        </div>
    </body>
</html>