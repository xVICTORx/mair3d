$(document).ready(function () {
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

    $("#loginButton").button({
        icons: {
            secondary: 'ui-icon-key'
        }
    }).click(function () {
        login();
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

    $("#registerButton").button({
        icons: {
            secondary: 'ui-icon-pencil'
        }
    }).click(function () {
        window.location = base_url + "/registro";
    });

    $('#buscar').button({icons: {primary: 'ui-icon-search'}}).click(function() {
        window.location = base_url + "/welcome/buscar/" +$('#buscador').val();
    });

    $('ul.thumb li').Zoomer({
        speedView:200,
        speedRemove:400,
        altAnim:true,
        speedTitle:0,
        debug:false
    });

});

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