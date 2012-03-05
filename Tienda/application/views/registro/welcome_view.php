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
        <script src="<?php echo base_url(JS_REGISTRO_WELCOME_READY) ?>" type="text/javascript"></script>
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
                <h3 class="tituloMediano2 ui-widget-header ui-corner-all">Registro</h3>
                <table style="width: 100%;" class="ui-widget-content ui-corner-all">
                    <tr>
                        <td id="errorFrm1" colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3 class="textoChico ui-widget-header ui-corner-all">Datos de acceso</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="login1">Nombre de usuario:</label></td>
                        <td>
                            <input type="text" maxlength="100" name="login1" id="login1" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" />
                            <input type="hidden" id="indicador" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="password">Contraseña:</label></td>
                        <td><input type="password" maxlength="100" name="password1" id="password1" class="ui-widget-content ui-corner-all inputForm" placeholder="***********" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="confirmPassword">Confirmar contraseña:</label></td>
                        <td><input type="password" maxlength="100" name="confirmPassword1" id="confirmPassword1" class="ui-widget-content ui-corner-all inputForm" placeholder="***********" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h3 class="textoChico ui-widget-header ui-corner-all">Datos Personales</h3></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="nombre">Nombre(s):</label></td>
                        <td><input type="text" maxlength="150" name="nombre" id="nombre" class="ui-widget-content ui-corner-all inputForm" placeholder="Nombre" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="apPaterno">Primer Apellido:</label></td>
                        <td><input type="text" maxlength="150" name="apPaterno" id="apPaterno" class="ui-widget-content ui-corner-all inputForm" placeholder="Primer apellido" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="apMaterno">Segundo Apellido:</label></td>
                        <td><input type="text" maxlength="150" name="apMaterno" id="apMaterno" class="ui-widget-content ui-corner-all inputForm" placeholder="Segundo apellido" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="nombreEmpresa">Nombre de la empresa:</label></td>
                        <td><input type="text" maxlength="255" name="nombreEmpresa" id="nombreEmpresa" class="ui-widget-content ui-corner-all inputForm" placeholder="Nombre de la empresa" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="telefono">Telefono:</label></td>
                        <td><input type="text" maxlength="45" name="telefono" id="telefono" class="ui-widget-content ui-corner-all inputForm" placeholder="Telefono" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="email">Correo Electronico:</label></td>
                        <td><input type="text" maxlength="255" name="email" id="email" class="ui-widget-content ui-corner-all inputForm" placeholder="ejemplo@dominio.com" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h3 class="textoChico ui-widget-header ui-corner-all">Datos de facturacion</h3></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="razonSocial">Razon Social:</label></td>
                        <td><input type="text" maxlength="255" name="razonSocial" id="razonSocial" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="rfc">R.F.C.:</label></td>
                        <td><input type="text" maxlength="100" name="rfc" id="rfc" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="calle">Calle:</label></td>
                        <td><input type="text" maxlength="100" name="calle" id="calle" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="numero">Numero:</label></td>
                        <td><input type="text" maxlength="10" name="numero" id="numero" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="colonia">Colonia:</label></td>
                        <td><input type="text" maxlength="100" name="colonia" id="colonia" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="municipio">Municipio o Delegacion:</label></td>
                        <td><input type="text" maxlength="100" name="municipio" id="municipio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="estado">Estado:</label></td>
                        <td><input type="text" maxlength="100" name="estado" id="estado" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="cp">Codigo Postal:</label></td>
                        <td><input type="text" maxlength="5" name="cp" id="cp" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="email2">Correo Electronico (factura):</label></td>
                        <td><input type="text" maxlength="255" name="email2" id="email2" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right;"><label for="direccionButtons">Es la misma direccion la de envio que la fiscal?:</label></td>
                        <td><div id="direccionButtons">
                                <input style="width: auto; float: left;" type="radio" id="radio1" name="direccion" checked="checked" value="SI" />
                                <label style="width: auto; float: left;" for="radio1">SI</label>
                                <input style="width: auto; float: left;" type="radio" id="radio2" name="direccion" value="NO"/>
                                <label style="width: auto; float: left;" for="radio2">No</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td colspan="2"><h3 class="textoChico ui-widget-header ui-corner-all">Direccion Envio</h3></td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="calleEnvio">Calle:</label></td>
                        <td><input type="text" maxlength="255" name="calleEnvio" id="calleEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="numeroExtEnvio">Numero Exterior:</label></td>
                        <td><input type="text" maxlength="255" name="numeroExtEnvio" id="numeroExtEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="numeroIntEnvio">Numero Interior:</label></td>
                        <td><input type="text" maxlength="255" name="numeroIntEnvio" id="numeroIntEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="coloniaEnvio">Colonia:</label></td>
                        <td><input type="text" maxlength="100" name="coloniaEnvio" id="coloniaEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr  class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="cpEnvio">Codigo postal:</label></td>
                        <td><input type="text" maxlength="5" name="cpEnvio" id="cpEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="municipioEnvio">Municipio o delegacion:</label></td>
                        <td><input type="text" maxlength="100" name="municipioEnvio" id="municipioEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr class="direccionEnvio">
                        <td style="width: 25%; text-align: right;"><label for="estadoEnvio">Estado:</label></td>
                        <td><input type="text" maxlength="100" name="estadoEnvio" id="estadoEnvio" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" colspan="2"><button id="send">Registrarse</button></td>
                    </tr>
                </table>
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
                                <td colspan="2">Nombre de Usuario:</td>
                            </tr>
                            <tr style="text-align: center">
                                <td colspan="2"><input type="text" maxlength="50" name="login" id="login" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off" /></td>
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