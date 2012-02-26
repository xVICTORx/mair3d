$(document).ready(function() {

    $("#treeMenu").jqGrid({
        colnames: ["Categorias"],
        colModel: [
            {
                name:'id',
                index:'id',
                width:1,
                hidden:true,
                key:true
            },
            {
                name: "Categorias",
                index: "Categorias",
                width: 140,
                sortable: false,
                expanded: true
            }
        ],
        url: base_url + "/welcome/tree?categoria="+categoria,
        caption: "Menu de categorias",
        treedatatype: "xml",
        hidegrid: false,
        treeGrid: true,
        treeGridModel: 'adjacency',
        ExpandColumn : 'Categorias',
        height: "auto",
        pager: false,
        treeIcons:  {
            plus:'ui-icon-plusthick',
            minus:'ui-icon-minusthick',
            leaf:'ui-icon-bullet'
        }
    });

    $("#checkOut").button().click(function () {
        window.location = base_url + "/carrito";
    });

    $(".removeProducto").button();

    $("#send").button().click(
    function() {
        registrarse();
    });

    $("#loginButton").button({
        icons: {
            secondary: 'ui-icon-key'
        }
    }).click(function () {
        login();
    });

    $("#registerButton").button({
        icons: {
            secondary: 'ui-icon-pencil'
        }
    }).click(function () {
        window.location = base_url + "/registro";
    });

    $("#login1").change(function () {
        if(validateCorreo()){
            $.blockUI({
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .4,
                    color: '#fff'
                },
                message: '<h3>Validando correo, por favor espere...</h3>'
            });
            $.ajax({
                url: base_url + "/registro/checkCorreo",
                type: 'post',
                async: true,
                dataType: 'json',
                data: {
                    correo: $("#login1").val()
                },
                success: function (data) {
                    $.unblockUI();
                    if(data.estatus == 0){
                        $("#indicador").val(data.estatus);
                        $("#errorFrm1").removeClass('ui-state-highlight').show('');
                        $("#login1").removeClass('ui-state-error');
                    } else {
                        $("#indicador").val(data.estatus);
                        $("#errorFrm1").addClass('ui-state-highlight').html(data.mensaje).show('');
                        $("#login1").addClass('ui-state-error');
                    }
                }
            });
        }
    });

    $("#closeSession").button(function (){
        icons: {
            secondary: 'ui-icon-close'
        }
    }).click(function (){
        $.ajax({
            url: base_url + "/registro/logout",
            type: "post",
            datatype: "html",
            success: function(data) {
                location.reload(1);
            }
        })
    });

    $(".direccionEnvio").hide();

    $("#direccionButtons").buttonset();

    $(":radio[name='direccion']").change(function () {
        if($(this).attr('value') == "NO") {
            $(".direccionEnvio").show('slow');
        } else if($(this).attr('value') == "SI") {
            $(".direccionEnvio").hide('slow');
        }
    });

    $('#buscar').button({icons: {primary: 'ui-icon-search'}}).click(function() {
        window.location = base_url + "/welcome/buscar/" +$('#buscador').val();
    });
});


function validateCorreo() {
    if($("#login1").val() == "" || $("#login1").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su correo electronico').show('');
        $("#login1").addClass('ui-state-error').focus();
        return false;
    } else if(!(/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test($("#login1").val()))) {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba un correo electronico valido ejemplo@dominio.com').show('');
        $("#login1").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#login1").removeClass('ui-state-error');
    }
    return true;
}

function removeProducto(rowid) {
    $.ajax({
        url: base_url + "/carrito/welcome/removeProducto/" + rowid,
        data: {},
        datatype: "html",
        success: function (data) {
            $("#carrito").html(data);
            $(".removeProducto").button();
            $("#checkOut").button().click(function () {
                window.location = base_url + "/carrito";
            });
        }
    });
}

function registrarse () {
    if(validarFormulario() == true) {
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .4,
                color: '#fff'
            },
            message: '<h3>Registrando e iniciando sesion...</h3>'
        });
        var data = new Object();
        data.login = $("#login1").val();
        data.pass = $("#password1").val();
        data.nombre = $("#nombre").val();
        data.apPaterno = $("#apPaterno").val();
        data.apMaterno = $("#apMaterno").val();
        data.telefono = $("#telefono").val();
        data.calle = $("#calle").val();
        data.colonia = $("#colonia").val();
        data.cp = $("#cp").val();
        data.municipio = $("#municipio").val();
        data.estado = $("#estado").val();
        data.pais = $("#pais").val();

        data.calleEnvio = $("#calleEnvio").val();
        data.coloniaEnvio = $("#coloniaEnvio").val();
        data.cpEnvio = $("#cpEnvio").val();
        data.municipioEnvio = $("#municipioEnvio").val();
        data.estadoEnvio = $("#estadoEnvio").val();
        data.paisEnvio = $("#paisEnvio").val();
        $.ajax({
            url: base_url + "/registro/nuevo",
            type: "post",
            datatype: "html",
            data: data,
            success: function (respuesta) {
                //window.location = base_url + "/welcome";
            }
        });
    }
}

function validarFormulario () {
    if($("#indicador").val() == 1) {
        $("#errorFrm1").addClass('ui-state-highlight').html('Este correo ya esta registrado').show('');
        $("#login1").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#login1").removeClass('ui-state-error');
    }
    if($("#login1").val() == "" || $("#login1").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su correo electronico').show('');
        $("#login1").addClass('ui-state-error').focus();
        return false;
    } else if(!(/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test($("#login1").val()))) {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba un correo electronico valido ejemplo@dominio.com').show('');
        $("#login1").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#login1").removeClass('ui-state-error');
    }

    if($("#password1").val() == ''){
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su contraseña').show('');
        $("#password1").addClass('ui-state-error').focus();
        return false;
    } else if($("#password1").val() != $("#confirmPassword1").val()) {
        $("#errorFrm1").addClass('ui-state-highlight').html('Las contraseñas no coinciden').show('');
        $("#password1").addClass('ui-state-error').focus();
        $("#confirmPassword1").addClass('ui-state-error');
        return false;
    } else {
        $("#errorFrm").removeClass('ui-state-highlight').html('').hide();
        $("#password1").removeClass('ui-state-error');
        $("#confirmPassword1").removeClass('ui-state-error');
    }

    if($("#nombre").val() == "" || $("#nombre").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su nombre').show('');
        $("#nombre").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#nombre").removeClass('ui-state-error');
    }

    if($("#apPaterno").val() == "" || $("#apPaterno").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su primer apellido').show('');
        $("#apPaterno").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#apPaterno").removeClass('ui-state-error');
    }

    if($("#apMaterno").val() == "" || $("#apMaterno").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su segundo apellido').show('');
        $("#apMaterno").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#apMaterno").removeClass('ui-state-error');
    }

    if($("#nombre").val() == "" || $("#nombre").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su nombre').show('');
        $("#nombre").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#nombre").removeClass('ui-state-error');
    }

    if($("#telefono").val() == "" || $("#telefono").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba su telefono').show('');
        $("#telefono").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#telefono").removeClass('ui-state-error');
    }

    if($("#calle").val() == "" || $("#calle").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba la calle').show('');
        $("#calle").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#calle").removeClass('ui-state-error');
    }

    if($("#colonia").val() == "" || $("#colonia").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba la colonia').show('');
        $("#colonia").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#colonia").removeClass('ui-state-error');
    }

    if($("#cp").val() == "" || $("#cp").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el codigo postal').show('');
        $("#cp").addClass('ui-state-error').focus();
        return false;
    } else if(!/^[0-9]*$/.test($("#cp").val()) || $("#cp").val().length < 5) {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba un codigo postal valido').show('');
        $("#cp").addClass('ui-state-error').focus();
        return false;
    }else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#cp").removeClass('ui-state-error');
    }

    if($("#municipio").val() == "" || $("#municipio").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el municipio o delegacion').show('');
        $("#municipio").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#municipio").removeClass('ui-state-error');
    }

    if($("#estado").val() == "" || $("#estado").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el estado').show('');
        $("#estado").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#estado").removeClass('ui-state-error');
    }

    if($("#pais").val() == "" || $("#pais").val() == " ") {
        $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el pais').show('');
        $("#pais").addClass('ui-state-error').focus();
        return false;
    } else {
        $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
        $("#pais").removeClass('ui-state-error');
    }
    if($(":radio[name='direccion']:checked").attr('value') == "NO") {
        if($("#calleEnvio").val() == "" || $("#calleEnvio").val() == " ") {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba la calle').show('');
            $("#calleEnvio").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
            $("#calleEnvio").removeClass('ui-state-error');
        }

        if($("#coloniaEnvio").val() == "" || $("#coloniaEnvio").val() == " ") {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba la colonia').show('');
            $("#coloniaEnvio").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
            $("#coloniaEnvio").removeClass('ui-state-error');
        }

        if($("#cpEnvio").val() == "" || $("#cpEnvio").val() == " ") {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el codigo postal').show('');
            $("#cpEnvio").addClass('ui-state-error').focus();
            return false;
        } else if(!/^[0-9]*$/.test($("#cpEnvio").val()) || $("#cpEnvio").val().length < 5) {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba un codigo postal valido').show('');
            $("#cpEnvio").addClass('ui-state-error').focus();
            return false;
        }else {
            $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
            $("#cpEnvio").removeClass('ui-state-error');
        }

        if($("#municipioEnvio").val() == "" || $("#municipioEnvio").val() == " ") {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el municipio o delegacion').show('');
            $("#municipioEnvio").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
            $("#municipioEnvio").removeClass('ui-state-error');
        }

        if($("#estadoEnvio").val() == "" || $("#estado").val() == " ") {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el estado').show('');
            $("#estadoEnvio").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
            $("#estadoEnvio").removeClass('ui-state-error');
        }

        if($("#paisEnvio").val() == "" || $("#paisEnvio").val() == " ") {
            $("#errorFrm1").addClass('ui-state-highlight').html('Escriba el pais').show('');
            $("#paisEnvio").addClass('ui-state-error').focus();
            return false;
        } else {
            $("#errorFrm1").removeClass('ui-state-highlight').html('').show('');
            $("#paisEnvio").removeClass('ui-state-error');
        }
    }

    return true;
}

function login() {
    if(validateFrm() == true){
        var data = new Object();
        data.login = $("#login").val();
        data.pass = $("#pass").val();
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .4,
                color: '#fff'
            },
            message: '<h3>Autentificando, por favor espere...</h3>'
        });
        $.ajax({
            url: base_url + "/registro/login",
            type: 'post',
            async: true,
            dataType: 'json',
            data: data,
            success: function (data) {
                $.unblockUI();
                if(data.estatus == 0){
                    location.reload(true)
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