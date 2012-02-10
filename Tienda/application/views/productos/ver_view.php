<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE_TIENDA ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo base_url(CSS_JQUERY) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_JQGRID) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_PRODUCTOS_WELCOME) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_ZOOMER) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_PRODUCTOS_VER) ?>" type="text/css" rel="stylesheet"/>
        <link rel="shortcut icon" href="<?php echo base_url("/resources/imgs/favicon.ico") ?>" />
        <script src="<?php echo base_url(JS_JQUERY) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UI) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID_I18N) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQGRID) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_BLOCK) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_UPLOAD) ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(JS_JQUERY_ZOOMER) ?>" type="text/javascript"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>index.php";
            var categoria = <?php echo $categoria; ?>;
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
                    <a href="#">Inicio</a>
                    <a href="#">Quienes somos</a>
                    <a href="#">Promociones</a>
                    <a href="#"><?php echo anchor(base_url(MODULE_PRODUCTOS), "Productos") ?></a>
                    <a href="#">Contacto</a>
                </h3>
            </div>
        </div>
        <div id="contenido">
            <div id="menu">
                <table id="treeMenu"></table>
            </div>
            <div id="modulo">
                <h3 class="tituloMediano ui-widget-header ui-corner-all"><?php echo $categoria; ?> - <?php echo $subcategoria; ?> - <?php echo $modelo; ?> </h3>
                <div class="imagenProducto">
                    <?php echo $imagenProducto; ?> 
                    <div class="coloresDisponibles">
                        <h3 class="tituloMediano ui-widget-header ui-corner-all">Imagenes</h3>
                        <?php foreach ($colores as $color): ?>
                            <?php if ($color["imagen"] != null): ?>
                                <div class="colorDispoble">
                                    <?php echo $color["imagen"]; ?>
                                    <br/>
                                    <?php echo $color["nombre"]; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="detalleProducto ui-widget-content ui-corner-all">
                    <input type="hidden" id="idProducto" value="<?php echo $idProducto; ?>" />
                    <input type="hidden" id="precio" value="<?php echo $precioFinal; ?>" />
                    <table align="center" class="tableDetalleProducto" cellpadding="2">
                        <tr>
                            <td><strong>Modelo: </strong></td>
                            <td><?php echo $modelo; ?></td>
                        </tr>
<!--                        <tr>
                            <td><strong>Categoria: </strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Subcategoria: </strong></td>
                            <td>></td>
                        </tr>-->
                        <tr>
                            <td><strong>Descripcion: </strong></td>
                            <td><p style="text-align: justify; width: 98%;"><?php echo $descripcion; ?></p></td>
                        </tr>
                        <?php if ($descuento != 0): ?>
                            <tr>
                                <td><strong>Precio: </strong></td>
                                <td class="precioTachado">$ <?php echo $precio; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Descuento: </strong></td>
                                <td class="descuento"><?php echo $descuento; ?> %</td>    
                            </tr>
                            <tr>
                                <td><strong>Precio final: </strong></td>
                                <td class="precio"><strong>$ <?php echo $precioFinal; ?></strong></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td><strong>Precio: </strong></td>
                                <td class="precio">$ <?php echo $precio; ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td><strong>Color:</strong></td>
                            <td>
                                <select id="idColor">
                                    <?php foreach ($colores as $color): ?>
                                        <option value="<?php echo $color["idColor"] ?>"><?php echo $color["nombre"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Talla:</strong></td>
                            <td>
                                <select id="idTalla">
                                    <?php foreach ($tallas as $talla): ?>
                                        <option value="<?php echo $talla["idTalla"] ?>"><?php echo $talla["talla"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Cantidad:</strong></td>
                            <td>
                                <input type="text" id="cantidad" value="1" readonly="true" size="2" style="width: auto;"/>
                            </td>
                        </tr>
                        <tr>                          
                            <td colspan="2">
                                <button id="agregarCarrito" style="width: 100%">Agregar al carrito</button>
                            </td>
                        </tr>
                    </table>
                    <div class="container">
                        <ul class="thumb">
                            <?php foreach ($colores as $color): ?>
                            <li onmouseover="cambiaImagen('<?php echo $color["imagenLink"] ?>')"><a><?php echo $color["imagenColor"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="rightSide">
                <div id="carrito" class="ui-widget-content ui-corner-all">
                    <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Carrito</h3>
                    <?php if (count($productos) > 0): ?>
                        <table style="width:  100%;">
                            <?php foreach ($productos as $key => $producto): ?>
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