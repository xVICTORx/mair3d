<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE_TIENDA ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo base_url(CSS_JQUERY) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_JQGRID) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_PRODUCTOS_WELCOME) ?>" type="text/css" rel="stylesheet"/>
        <link rel="shortcut icon" href="<?php echo base_url("/resources/imgs/favicon.ico") ?>" />
        <script src="<?php echo base_url(JS_JQUERY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UI) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID_I18N) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_BLOCK) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UPLOAD) ?>" type="text/javascript"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>index.php";
            var categoria = <?php echo $categoria; ?>;
        </script>
        <script src="<?php echo base_url(JS_PRODUCTOS_WELCOME_READY) ?>" type="text/javascript"></script>
    </head>
    <body>
        <div id="header">
            <div id="socialHeader">
                <div id="linksHeader">
                    <?php echo anchor("https://www.facebook.com/profile.php?id=100002308096874&ref=ts", img(base_url("resources/imgs/facebook.png"))) ?>
                    &nbsp;&nbsp;
                    <?php echo anchor("https://twitter.com/raklyndemexico", img(base_url("resources/imgs/twitter.png"))) ?>
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
                        <input type="text" style="height: 10px; width: 150px; margin-top: -2px;" class="ui-widget-content ui-corner-all" id="buscador" placeholder="Buscar un producto..."/>
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
                <h3 class="tituloMediano ui-widget-header ui-corner-all"><?php echo $titulo ?></h3>
                <?php if ($totalPages > 0): ?>
                    <div id="paginador" class="ui-widget-content">
                        Pagina:
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <?php echo anchor($module . $i, $i . "&nbsp;"); ?>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="producto">
                        <div class="imagenProducto">
                            <?php echo $producto["imagenHtmlProducto"]; ?>
                        </div>
                        <div class="detalleProducto">
                            <table align="center" class="tableDetalleProducto">
                                <tr>
                                    <td><strong>Modelo: </strong></td>
                                    <td><?php echo $producto[TABLE_PRODUCTO_MODELO]; ?></td>
                                </tr>
                                <?php //if ($producto[TABLE_PRODUCTO_DESCUENTO] != 0): ?>
    <!--                                    <tr>
                                        <td><strong>Precio: </strong></td>
                                        <td class="precioTachado">$ <?php //echo $producto[TABLE_PRODUCTO_PRECIO];  ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Descuento: </strong></td>
                                        <td class="descuento"><?php //echo $producto[TABLE_PRODUCTO_DESCUENTO];  ?> %</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Precio final: </strong></td>
                                        <td class="precio"><strong>$ <?php //echo $producto["precioFinal"];  ?></strong></td>
                                    </tr>-->
                                <?php //else: ?>
                                <tr>
                                    <td><strong>Precio: </strong></td>
                                    <td class="precio">$ <?php echo number_format($producto[TABLE_PRODUCTO_PRECIO]); ?></td>
                                </tr>
                                <?php //endif; ?>
    <!--                                <tr>
                                <td><strong>Categoria: </strong></td>
                                <td><?php //echo $producto[TABLE_CATEGORIA];  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Subcategoria: </strong></td>
                                <td><?php //echo $producto[TABLE_PRODUCTO_ID_SUBCATEGORIA];  ?></td>
                            </tr>-->
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
                <br/>
                <?php if ($totalPages > 0): ?>
                    <div id="paginador" class="ui-widget-content">
                        Pagina:
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <?php echo anchor($module . $i, $i . "&nbsp;"); ?>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div id="rightSide">
                <div id="carrito" class="ui-widget-content ui-corner-all">
                    <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Carrito</h3>
                    <?php if (count($productosCarrito) > 0): ?>
                        <table style="width:  100%;">
                            <?php foreach ($productosCarrito as $key => $producto): ?>
                                <tr>
                                    <td>x<?php echo $producto["qty"]; ?></td>
                                    <td><?php echo $producto["options"]["imagen"] ?></td>
                                    <td><?php echo substr($producto["name"], 0, 5) ?>...</td>
                                    <td><?php echo substr($producto["options"]["color"], 0, 2) ?>.</td>
                                    <td><?php echo substr($producto["options"]["talla"], 0, 2) ?>.</td>

                                    <td><button class="removeProducto" onclick="removeProducto('<?php echo $producto["rowid"]; ?>')">Quitar</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <table style="width:  100%;">
                            <tr>
                                <td><button  id="checkOut" class="botonLargo">Comprar ahora</button></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <h3 class="textoChico ui-corner-all">Su carrito esta vacio</h3>
                    <?php endif; ?>
                </div>
                <br/>
                <div id="loginCliente" class="ui-widget-content ui-corner-all">
                    <?php if ($this->session->userdata("idCliente") == false): ?>
                        <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Iniciar sesión</h3>
                        <table style="width:  100%;">

                            <tr  style="text-align: center">
                                <td id="errorFrm" colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Correo electronico:</td>
                            </tr>
                            <tr style="text-align: center">
                                <td colspan="2"><input type="text" maxlength="50" name="login" id="login" class="ui-widget-content ui-corner-all inputForm" placeholder="ejemplo@dominio.com" autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">Contraseña:</td>
                            </tr>
                            <tr style="text-align: center">
                                <td colspan="2"><input type="password" maxlength="50" name="pass" id="pass" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                            </tr>
                            <tr style="text-align: center">
                                <td><button id="loginButton">Enviar</button></td>
                                <td><button id="registerButton">Registrarse</button></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Bienvenido</h3>
                        <table style="width:  100%;">
                            <tr style="text-align: center">
                                <td><?php echo $this->session->userdata("nombre") . " " . $this->session->userdata("apPaterno") ?></td>
                            </tr>
                            <tr style="text-align: center">
                                <td><button id="closeSession">Cerrar sesion</button></td>
                            </tr>
                        </table>
                    <?php endif; ?>
                </div>
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