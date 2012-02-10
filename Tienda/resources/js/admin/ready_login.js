$(document).ready(function (){
   $("#enviar").button({
        icons: {
           secondary: 'ui-icon-key'
       }
   }).click(function (){
       login();
   });
   $("#cancelar").button({
       icons: {
           secondary: 'ui-icon-closethick'
       }
   }).click(function (){
       $('#login').val('').removeClass('ui-state-error');
       $('#password').val('').removeClass('ui-state-error');
       $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
   });
   
   $("#errorFrm").hide();
});

function login() {
    if(validateFrm() == true){
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
        }, message: '<h3>Autentificando, por favor espere...</h3>'});
        $.ajax({
           url: base_url + "/admin/authenticate",
           type: 'post',
           async: true,
           dataType: 'json',
           data: data,
           success: function (data) {
               $.unblockUI();
               if(data.estatus == 0){
                   location.reload(1)
               } else {
                   $("#errorFrm").addClass('ui-state-highlight').html(data.mensaje).show('');
                   $("#login").addClass('ui-state-error');
                   $("#password").addClass('ui-state-error');
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
    if($("#password").val() == ''){
        $("#errorFrm").addClass('ui-state-highlight').html('Escriba su contraseña').show('');
        $("#password").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
        $("#password").removeClass('ui-state-error').focus();
    }
    return true;
}