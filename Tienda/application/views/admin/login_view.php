<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE_ADMIN ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?php echo base_url(CSS_JQUERY) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_JQGRID) ?>" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(CSS_ADMIN_LOGIN) ?>" type="text/css" rel="stylesheet"/>
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
        <script src="<?php echo base_url(JS_ADMIN_READY_LOGIN) ?>" type="text/javascript"></script>
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
        </div>
        <div id="contenido">
            <div id="loginDiv" class="ui-widget-content ui-corner-all">
                <h5 class="uiHeader ui-widget-header ui-corner-all">Iniciar Sesión</h5>
                <fieldset>
                    <p id="errorFrm">
                    </p>
                    <p>
                        <label for="login">Nombre de usuario:</label>
                        <input type="text" maxlength="50" name="login" id="login" class="ui-widget-content ui-corner-all" placeholder="Usuario" autocomplete="off"/>
                    </p>
                    <p>
                        <label for="password">Contraseña:</label>
                        <input type="password" maxlength="50" name="password" id="password" class="ui-widget-content ui-corner-all" placeholder="***********" autocomplete="off"/>
                    </p>
                    <p id="buttons">
                        <button id="enviar">Enviar</button>
                        <button id="cancelar">Cancelar</button>
                    </p>
                    <p id="note">
                        <strong>Nota:</strong> El nombre de usuario y la contraseña son sensibles a mayúsculas y minúsculas
                    </p>
                </fieldset>
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
