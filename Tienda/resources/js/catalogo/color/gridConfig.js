$.jgrid.edit = {
    width: 450,
    addCaption: "Agregar color",
    editCaption: "Editar color",
    bSubmit: "Guardar",
    bCancel: "Cancelar",
    processData: "Guardando...",
    closeAfterEdit: true,
    closeAfterAdd: true,
    closeOnEscape: true,
    msg: {
        required:"Este campo es requerido",
        number:"Ingrese un numero valido",
        integer: "Ingrese un entero",
        email: "Escriba una direccion de correo electronico valida",
        url: "Escriba una direccion valida como http://example.com"
    },
    onInitializeForm : function(formid) {
        $(formid).attr("method","POST");
        $(formid).attr("action","");
        $(formid).attr("enctype","multipart/form-data");
        $("<button id='buttonSubirImagen'>Subir</button><button id='eliminarImagen'>Eliminar</button>").insertAfter("#subirImagen",formid);
        $("#imagen").hide();
        $("#eliminarImagen").button().click(function (){
            $("#verImagen").html("");
            $("#imagen").val("");
        });
        $("<div id='verImagen'></div>").insertAfter("#imagen",formid);
        $("#verImagen").html("");
        $("#buttonSubirImagen",formid).button().click(function(){
            var subirImagen = $("#subirImagen").val();
            var extension = (subirImagen.substring(subirImagen.lastIndexOf("."))).toLowerCase();
            if(extension == ".jpg" || extension == ".png" || extension == "gif" || extension == ".jpeg"){
                $.blockUI({
                    css: { 
                        border: "none", 
                        padding: "15px", 
                        backgroundColor: "#000", 
                        "-webkit-border-radius": "10px", 
                        "-moz-border-radius": "10px", 
                        opacity: .4, 
                        color: "#fff" 
                    }, 
                    message: "<h3>Subiendo imagen, por favor espere...</h3>"
                });
                $.ajaxFileUpload({
                    url: base_url + "/util/subir/index/subirImagen",
                    secureuri: false,
                    fileElementId:"subirImagen",
                    dataType: "json",
                    success: function (data, status) {
                        $.unblockUI();
                        if(typeof(data.error) != "undefined")
                        {
                            if(data.error != "")
                            {
                                alert(data.error);
                            }else{
                                $("#imagen").val(data.msg);
                                $("#verImagen").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                            }
                        }
                    }
                });
            } else {
                $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                $("#alerta").dialog("open");
                $("#verImagen").val("");
            }
        });
    },
    afterShowForm : function () {
        $("#verImagen").html("");
    },
    afterComplete : function () {
        $("#verImagen").html("");
    }
}