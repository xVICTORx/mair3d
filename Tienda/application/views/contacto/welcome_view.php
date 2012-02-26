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
        <style type="text/css">
            .rojo {
                color: #906;
            }
        </style>
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
            <div id="modulo">
                <p>&nbsp;</p>
                <table width="" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" valign="middle"><p class="rojo">Dirección: </p>
                            <p>Doctor Valenzuela # 67, Colonia de los Doctores, <br />
                                Delegación Cuauhtémoc C.P. 06720, México D.F.<br />
                                <br />
                                <span class="rojo">Teléfono :</span><span class="tels"> 57618211</span></p>
                            <p> <span class="rojo">Fax :</span><span class="tels"> 57615521</span><br />
                                <br />
                                <span class="rojo">Correo Electrónico
                                    :</span> <a href="mailto:ventas@raklyn.com.mx">ventas@raklyn.com.mx</a></p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p></td>
                        <td>&nbsp;</td>
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.mx/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Doctor+Valenzuela+67,+Col.+Doctores,+M%C3%A9xico,+D.F.+C.P.+06720&amp;aq=&amp;sll=23.725012,-102.524414&amp;sspn=32.036449,67.631836&amp;ie=UTF8&amp;hq=&amp;hnear=Doctor+Valenzuela+67,+Doctores,+Cuauht%C3%A9moc,+Ciudad+de+M%C3%A9xico,+Distrito+Federal&amp;ll=19.421278,-99.144168&amp;spn=0.008145,0.016512&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                            <p><br />
                                <small><a href="http://maps.google.com.mx/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Doctor+Valenzuela+67,+Col.+Doctores,+M%C3%A9xico,+D.F.+C.P.+06720&amp;aq=&amp;sll=23.725012,-102.524414&amp;sspn=32.036449,67.631836&amp;ie=UTF8&amp;hq=&amp;hnear=Doctor+Valenzuela+67,+Doctores,+Cuauht%C3%A9moc,+Ciudad+de+M%C3%A9xico,+Distrito+Federal&amp;ll=19.421278,-99.144168&amp;spn=0.008145,0.016512&amp;t=m&amp;z=14" target="_blank" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small> </p>
                            <p></p></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
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