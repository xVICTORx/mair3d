$(document).ready(function (){
    $("#send").button({
       icons: {
           secondary: "ui-icon-disk"
       }
   }).click(function () {
       saveUser();
   });
});

function saveUser () {
    if(validateFrm() == true) {
        var data = new Object();
        data.login = $("#login").val();
        data.pass = $("#password").val();
        $.blockUI({css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .4, 
            color: '#fff' 
        }, message: '<h3>Guardando, por favor espere...</h3>'});
        $.ajax({
           url: base_url + "/autentificacion/welcome/save",
           type: 'post',
           async: true,
           dataType: 'json',
           data: data,
           success: function (data) {
               $.unblockUI();
               $("#errorFrm").addClass('ui-state-highlight').html(data.mensaje).show('');
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
    if($("#password").val() == ''){
        $("#errorFrm").addClass('ui-state-highlight').html('Escriba su contraseña').show('');
        $("#password").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
        $("#password").removeClass('ui-state-error').focus();
    }
    
    if($("#confirmPassword").val() == ''){
        $("#errorFrm").addClass('ui-state-highlight').html('Escriba su contraseña').show('');
        $("#confirmPassword").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
        $("#confirmPassword").removeClass('ui-state-error').focus();
        if($("#password").val() != $("#confirmPassword").val()){
            $("#errorFrm").addClass('ui-state-highlight').html('Las contraseñas no coinciden').show('');
            $("#confirmPassword").addClass('ui-state-error').focus();
            $("#password").addClass('ui-state-error').focus();
            return false;
        }
    }
    return true;
}