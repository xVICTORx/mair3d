<script src="<?php echo base_url(JS_AUTENTIFICACION_READY); ?>" type="text/javascript"></script>
<link href="<?php echo base_url(CSS_AUTENTIFICACION_WELCOME); ?>" type="text/css" rel="stylesheet"/>
<div class="ui-widget-content ui-corner-all">
    <fieldset>
        <h3 class="uiHeader ui-widget-header ui-corner-all">Datos de acceso</h3>
        <p id="errorFrm">
        </p>
        <p>
            <label for="login">Nombre de usuario:</label>
            <input type="text" maxlength="50" name="login" id="login" class="ui-widget-content ui-corner-all inputForm" placeholder="Usuario" autocomplete="off" value="<?php echo $login; ?>"/>
        </p>
        <p>
            <label for="password">Contraseña:</label>
            <input type="password" maxlength="50" name="password" id="password" class="ui-widget-content ui-corner-all inputForm" placeholder="***********" autocomplete="off" value="<?php echo $pass; ?>"/>
        </p>
        <p>
            <label for="confirmPassword">Confirmar contraseña:</label>
            <input type="password" maxlength="50" name="confirmPassword" id="confirmPassword" class="ui-widget-content ui-corner-all inputForm" placeholder="***********" autocomplete="off" value="<?php echo $pass; ?>"/>
        </p>
        <p id="buttons">
            <button id="send">Guardar</button>
        </p>
    </fieldset>
</div>