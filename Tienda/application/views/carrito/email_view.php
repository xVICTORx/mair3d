<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE_ADMIN ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo base_url(CSS_JQUERY) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_JQGRID) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_PRODUCTOS_WELCOME) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_PRODUCTOS_VER) ?>" type="text/css" rel="stylesheet"/>

        <script src="<?php echo base_url(JS_JQUERY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UI) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID_I18N) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_BLOCK) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UPLOAD) ?>" type="text/javascript"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>index.php";
            
        </script>
        <script src="<?php echo base_url(JS_PRODUCTOS_WELCOME_READY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_PRODUCTOS_VER_READY) ?>" type="text/javascript"></script>
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
        </div>
        <div id="contenido">
            <h3 class="tituloMediano">
                Se ah registrado su pedido correctamente. Numero de pedido: #<?php echo $pedido; ?>
            </h3>
            <h3 class="tituloMediano">
                Detalle:
            </h3>
            <div style="width: 600px; height: auto;">
                <table style="width: 100%;">
                    <tr>
                        <td><strong>Producto</strong></td>
                        <td><strong>Color</strong></td>
                        <td><strong>Talla</strong></td>
                        <td><strong>Cantidad</strong></td>
                        <td><strong>Precio</strong></td>
                        <td><strong>Subtotal</strong></td>
                    </tr>
                    <?php
                    $subtotal = 0;
                    foreach ($productos as $key => $producto):
                        ?>
                        <tr>
                            <td><?php echo $producto["name"] ?></td>
                            <td><?php echo $producto["options"]["color"] ?></td>
                            <td><?php echo $producto["options"]["talla"] ?></td>
                            <td><?php echo $producto["qty"] ?></td>
                            <td>$<?php echo $producto["price"] ?></td>
                            <td>$<?php echo $producto["price"] * $producto["qty"] ?></td>
                        </tr>

                        <?php
                        $subtotal += $producto["price"] * $producto["qty"];
                    endforeach;
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong class="descuento">Subtotal:</strong></td>
                        <td><strong class="descuento">$<?php echo $subtotal; ?></strong></td>
                    </tr>
                    <?php if ($descuento > 0): ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><strong class="descuento">Descuento:</strong></td>
                            <td><strong class="descuento">$<?php echo ($subtotal * ($descuento / 100)); ?></strong></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong class="descuento">Envio:</strong></td>
                        <td><strong class="descuento">$<?php echo COSTO_ENVIO; ?></strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong class="precio">Total:</strong></td>
                        <td><strong class="precio">$<?php echo ($subtotal - ($subtotal * ($descuento / 100))) + COSTO_ENVIO; ?></strong></td>
                    </tr>
                </table>
                <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Datos de entrega</h3>
                <table>
                    <tr>
                        <td><strong>Nombre:</strong></td>
                        <td><?php echo $cliente->getNombre() . " " . $cliente->getApPaterno() . " " . $cliente->getApMaterno(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Correo:</strong></td>
                        <td><?php echo $cliente->getLogin(); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Direccion:</strong></td>
                        <td><?php echo $cliente->getCalleNumero() . " " . $cliente->getColonia() . ", " . $cliente->getMunicipio() . ", " . $cliente->getEstado() . ", " . $cliente->getPais() . " CP: " . $cliente->getCp(); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="footer">
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