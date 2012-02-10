$(document).ready(function (){
    
    var optionsAdd = {
        width: 450,
        addCaption: "Agregar un color",
        editCaption: "Modificar color",
        bSubmit: "Guardar color",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
        viewPagerButtons: false,
        msg: {
            required:"Campo obligatorio",
            number:"Introduzca un número",
            minValue:"El valor debe ser mayor o igual a ",
            maxValue:"El valor debe ser menor o igual a ",
            email: "no es una dirección de correo válida",
            integer: "Introduzca un valor entero",
            date: "Introduza una fecha correcta ",
            url: "no es una URL válida. Prefijo requerido ('http://' or 'https://')",
            nodefined : " no está definido.",
            novalue : " valor de retorno es requerido.",
            customarray : "La función personalizada debe devolver un array.",
            customfcheck : "La función personalizada debe estar presente en el caso de validación personalizada."
        },
        onInitializeForm : function(formid) {
            $(formid).attr("method","POST");
            $(formid).attr("action","");
            $(formid).attr("enctype","multipart/form-data");
            $("<button id='buttonSubirImagen'>Subir</button><button id='eliminarImagenColor'>Eliminar</button>").insertAfter("#subirImagenColor",formid);
            $("#imagenColor").hide();
            $("#eliminarImagenColor").button().click(function (){
                $("#verImagenColor").html("");
                $("#imagenColor").val("");
            });
            $("<div id='verImagenColor'></div>").insertAfter("#imagenColor",formid);
            $("#verImagenColor").html("");
            $("#buttonSubirImagen",formid).button().click(function(){
                var subirImagen = $("#subirImagenColor").val();
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
                        url: base_url + "/util/subir/index/subirImagenColor",
                        secureuri: false,
                        fileElementId:"subirImagenColor",
                        dataType: "json",
                        success: function (data, status) {
                            $.unblockUI();
                            if(typeof(data.error) != "undefined")
                            {
                                if(data.error != "")
                                {
                                    alert(data.error);
                                }else{
                                    $("#imagenColor").val(data.msg);
                                    $("#verImagenColor").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                                }
                            }
                        }
                    });
                } else {
                    $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                    $("#alerta").dialog("open");
                    $("#verImagenColor").val("");
                }
            });
        },
        afterShowForm : function (frm) {
            $("#verImagenColor").html("");
        },
        afterComplete : function () {
            $("#verImagenColor").html("");
        }
    };
    
    var optionsEdit = {
        width: 450,
        addCaption: "Agregar un color",
        editCaption: "Modificar color",
        bSubmit: "Guardar color",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
        viewPagerButtons: false,
        msg: {
            required:"Campo obligatorio",
            number:"Introduzca un número",
            minValue:"El valor debe ser mayor o igual a ",
            maxValue:"El valor debe ser menor o igual a ",
            email: "no es una dirección de correo válida",
            integer: "Introduzca un valor entero",
            date: "Introduza una fecha correcta ",
            url: "no es una URL válida. Prefijo requerido ('http://' or 'https://')",
            nodefined : " no está definido.",
            novalue : " valor de retorno es requerido.",
            customarray : "La función personalizada debe devolver un array.",
            customfcheck : "La función personalizada debe estar presente en el caso de validación personalizada."
        },
        onInitializeForm : function(formid) {
            $(formid).attr("method","POST");
            $(formid).attr("action","");
            $(formid).attr("enctype","multipart/form-data");
            $("<button id='buttonSubirImagen'>Subir</button><button id='eliminarImagenColor'>Eliminar</button>").insertAfter("#subirImagenColor",formid);
            $("#imagenColor").hide();
            $("#eliminarImagenColor").button().click(function (){
                $("#verImagenColor").html("");
                $("#imagenColor").val("");
            });
            $("<div id='verImagenColor'></div>").insertAfter("#imagenColor",formid);
            $("#verImagenColor").html("");
            $("#buttonSubirImagen",formid).button().click(function(){
                var subirImagen = $("#subirImagenColor").val();
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
                        url: base_url + "/util/subir/index/subirImagenColor",
                        secureuri: false,
                        fileElementId:"subirImagenColor",
                        dataType: "json",
                        success: function (data, status) {
                            $.unblockUI();
                            if(typeof(data.error) != "undefined")
                            {
                                if(data.error != "")
                                {
                                    alert(data.error);
                                }else{
                                    $("#imagenColor").val(data.msg);
                                    $("#verImagenColor").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                                }
                            }
                        }
                    });
                } else {
                    $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                    $("#alerta").dialog("open");
                    $("#verImagenColor").val("");
                }
            });
        },
        afterShowForm : function (frm) {
            var id = $("#colorGrid").jqGrid("getGridParam", "selrow");
            var row = $("#colorGrid").jqGrid("getRowData", id);
            $("#verImagenColor").html(row.imagenHtmlColor);
        },
        afterComplete : function () {
            $("#verImagenColor").html("");
        }
    };
    
    $("#colorGrid").jqGrid({
        colNames: ["idColor", "Nombre", "Descripción", "", "Imagen", "Imagen"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "nombre",
            index: "nombre",
            editable: true,
            align: "center",
            editoptions:{
                size: 65,
                maxlength: 100
            },
            editrules: {
                required: true
            },
            width: 100
        },
        {
            name: "descripcion",
            index: "descripcion",
            edittype: "textarea",
            align: "center",
            editable: true,
            editoptions:{
                cols: 64,
                rows: 5
            },
            width: 300
        },
        {
            name: "subirImagenColor",
            index: "subirImagenColor",
            editable: true,
            edittype: "file",
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "imagenColor",
            index: "imagenColor",
            editable: true,
            editoptions:{
                size: 65
            },
            hidden: true,
            editrules: {
                edithidden: true,
                required: true
            }
        },
        {
            name: "imagenHtmlColor",
            index: "imagenHtmlColor",
            editable: false,
            search: false,
            sortable: false,
            align: "center",
            editoptions:{
                size: 65
            },
            width: 200
        }
        ],
        url : base_url + "/administrador_catalogos/colores/operations?oper=load",
        editurl : base_url + "/administrador_catalogos/colores/operations",
        datatype : "json",
        caption : "Lista de colores disponibles",
        pager : "#colorPager",
        sortname : "idColor",
        rowNum : 10,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        rownumbers : true,
        height : "300px",
        autowidth: true,
        hidegrid : false,
        jsonReader : {
            repeatitems : false
        }
    });

    $("#colorGrid").jqGrid(
        "navGrid",
        "#colorPager",
        {
            edit: true,
            edittext: "Editar",
            add: true,
            addtext: "Agregar",
            del: true,
            deltext: "Eliminar",
            search: false,
            view: false,
            refreshtext: "Actualizar"
        },
        optionsEdit,
        optionsAdd
        );

    $("#colorGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});