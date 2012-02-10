<script>
    $(document).ready(function() {
        $("#loginButton").button({
            icons: {
                secondary: 'ui-icon-key'
            }
        }).click(function() {
            login();
        });
        $("#registrarseButton").button().click(function (){
            window.location = base_url + "/registro";
        });
    });

    function login() {
        if(validateFrm() == true){
            var data = new Object();
            data.login = $("#login").val();
            data.pass = $("#pass").val();
            $.blockUI({css: { 
                    border: 'none', 
                    padding: '15px', 
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '10px', 
                    '-moz-border-radius': '10px', 
                    opacity: .4, 
                    color: '#fff' 
                }, message: '<h3>Autentificando, por favor espere...</h3>'});
            $.ajax({
                url: base_url + "/registro/login",
                type: 'post',
                async: true,
                dataType: 'json',
                data: data,
                success: function (data) {
                    $.unblockUI();
                    if(data.estatus == 0){
                        $.ajax({
                            url: base_url + "/carrito/welcome/checkout",
                            type: "post",
                            datatype: "html",
                            success: function(data) {
                                $("#pedido").dialog("close");
                                $("#pedido").html(data);
                                $("#pedido").dialog("open");
                            }
                        });
                    } else {
                        $("#errorFrm").addClass('ui-state-highlight').html(data.mensaje).show('');
                        $("#login").addClass('ui-state-error');
                        $("#pass").addClass('ui-state-error');
                    }
                }
            });
        }
    }

    function validateFrm() {
        if($("#login").val() == ''){
            $("#errorFrm").addClass('ui-state-highlight').html('Escriba su nombre del usuario').show('');
            $("#login").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
            $("#login").removeClass('ui-state-error').focus();
        }
        if($("#pass").val() == ''){
            $("#errorFrm").addClass('ui-state-highlight').html('Escriba su contraseña').show('');
            $("#pass").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
            $("#pass").removeClass('ui-state-error').focus();
        }
        return true;
    }
</script>
<div style="width: 300px; height: 300px;">
    <h3 class="tituloMediano">Para procesar su pedido es nesesario que inicie sesion, en caso de no estar registrado aun de click en el boton registrarse</h3>
    <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Iniciar sesión</h3>
    <table style="width:  100%;">
        <tr  style="text-align: center">
            <td id="errorFrm"  colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">Correo electronico:</td>
        </tr>
        <tr style="text-align: center">
            <td colspan="2"><input type="text" maxlength="50" name="login" id="login" class="ui-widget-content ui-corner-all inputForm" placeholder="ejemplo@dominio.com" autocomplete="off" style="width: 95%"/></td>
        </tr>
        <tr>
            <td colspan="2">Contraseña:</td>
        </tr>
        <tr style="text-align: center">
            <td colspan="2"><input type="password" maxlength="50" name="pass" id="pass" class="ui-widget-content ui-corner-all inputForm" placeholder="" autocomplete="off"  style="width: 95%"/></td>
        </tr>
        <tr style="text-align: center">
            <td><button id="loginButton">Iniciar sesión</button></td>
            <td><button id="registrarseButton">Registrarse</button></td>
        </tr>
    </table>
</div>