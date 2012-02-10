$(document).ready(function() {
    
    var addProductoOptions  = {
        /* editOptions */
        width: 450,
        addCaption: "Agregar un producto",
        editCaption: "Modificar producto",
        bSubmit: "Guardar producto",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
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
            $("<button id='buttonSubirImagenProducto'>Subir</button><button id='eliminarImagenProducto'>Eliminar</button>").insertAfter("#subirImagenProducto",formid);
            $("#imagenProducto").hide();
            $("#eliminarImagenProducto").button().click(function (){
                $("#verImagenProducto").html("");
                $("#imagenProducto").val("");
            });
            $("<div id='verImagenProducto'></div>").insertAfter("#imagenProducto",formid);
            $("#verImagenProducto").html("");
            $("#buttonSubirImagenProducto",formid).button().click(function(){
                var subirImagen = $("#subirImagenProducto").val();
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
                        url: base_url + "/util/subir/index/subirImagenProducto",
                        secureuri: false,
                        fileElementId:"subirImagenProducto",
                        dataType: "json",
                        success: function (data, status) {
                            $.unblockUI();
                            if(typeof(data.error) != "undefined")
                            {
                                if(data.error != "")
                                {
                                    alert(data.error);
                                }else{
                                    $("#imagenProducto").val(data.msg);
                                    $("#verImagenProducto").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                                }
                            }
                        }
                    });
                } else {
                    $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                    $("#alerta").dialog("open");
                    $("#verImagenProducto").val("");
                }
            });
        },
        afterShowForm : function () {
            $("#verImagenProducto").html("");
        },
        afterComplete : function () {
            $("#verImagenProducto").html("");
        }
    };
    
    var editProductoOptions = {
        /* editOptions */
        width: 450,
        addCaption: "Agregar un producto",
        editCaption: "Modificar producto",
        bSubmit: "Guardar producto",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
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
            $("<button id='buttonSubirImagenProducto'>Subir</button><button id='eliminarImagenProducto'>Eliminar</button>").insertAfter("#subirImagenProducto",formid);
            $("#imagenProducto").hide();
            $("#eliminarImagenProducto").button().click(function (){
                $("#verImagenProducto").html("");
                $("#imagenProducto").val("");
            });
            $("<div id='verImagenProducto'></div>").insertAfter("#imagenProducto",formid);
            $("#verImagenProducto").html("");
            $("#buttonSubirImagenProducto",formid).button().click(function(){
                var subirImagen = $("#subirImagenProducto").val();
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
                        url: base_url + "/util/subir/index/subirImagenProducto",
                        secureuri: false,
                        fileElementId:"subirImagenProducto",
                        dataType: "json",
                        success: function (data, status) {
                            $.unblockUI();
                            if(typeof(data.error) != "undefined")
                            {
                                if(data.error != "")
                                {
                                    alert(data.error);
                                }else{
                                    $("#imagenProducto").val(data.msg);
                                    $("#verImagenProducto").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                                }
                            }
                        }
                    });
                } else {
                    $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                    $("#alerta").dialog("open");
                    $("#verImagenProducto").val("");
                }
            });
        },
        afterShowForm : function () { 
            var id = $("#productoGrid").jqGrid("getGridParam", "selrow");
            var row = $("#productoGrid").jqGrid("getRowData", id);
            $("#verImagenProducto").html(row.imagenHtmlProducto);
        },
        afterComplete : function () {
            $("#verImagenProducto").html("");
        }
    };
    
    // Grid Productos
    $("#productoGrid").jqGrid({
        colNames: ["idProducto", "Modelo", "Descripcion","Subcategoria", "Precio", "Descuento", "Destacado", "Activo", "Color (Default)", "", "Imagen", "Imagen"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "modelo",  
            index: "modelo",
            editable: true,
            editrules: {
                required: true
            },
            editoptions:{
                size: 65,
                maxlength: 255
            },
            width: 100,
            align: "center"
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
            width: 200
        },
        {
            name: "idSubcategoria",
            index: "idSubcategoria",
            edittype: "select",
            align: "center",
            editable: true,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/subcategorias"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/subcategorias"
            },
            width: 80
        },
        {
            name: "precio",  
            index: "precio",
            editable: true,
            editrules: {
                required: true,
                number: true
            },
            editoptions:{
                size: 65
            },
            width: 60,
            align: "center"
        },
        {
            name: "descuento",  
            index: "descuento",
            editable: true,
            editrules: {
                required: false,
                number: true,
                maxValue: 100
            },
            editoptions:{
                size: 65
            },
            width: 60,
            align: "center"
        },
        {
            name: "destacado",
            index: "destacado",
            edittype: "select",
            align: "center",
            editable: true,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/destacado"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/destacado"
            },
            width: 50
        },
        {
            name: "activo",
            index: "activo",
            edittype: "select",
            align: "center",
            editable: true,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/activo"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/activo"
            },
            width: 50
        },
        {
            name: "idColor",
            index: "idColor",
            edittype: "select",
            align: "center",
            editable: true,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/colores"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/colores"
            },
            width: 80
        },
        {
            name: "subirImagenProducto",
            index: "subirImagenProducto",
            editable: true,
            edittype: "file",
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "imagenProducto",
            index: "imagenProducto",
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
            name: "imagenHtmlProducto",
            index: "imagenHtmlProducto",
            editable: false,
            search: false,
            sortable: false,
            align: "center",
            editoptions:{
                size: 65
            },
            width: 150
        }
        ],
        url : base_url + "/administrador_catalogos/productos/operations?oper=load",
        editurl : base_url + "/administrador_catalogos/productos/operations",
        datatype : "json",
        caption : "Lista de productos disponibles",
        pager : "#productoPager",
        sortname : "idProducto",
        rowNum : 10,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        shrinkToFit: false,
        rownumbers : true,
        height : "300px",
        autowidth: true,
        hidegrid : true,
        jsonReader : {
            repeatitems : false
        },
        afterInsertRow: function() {
            $("#productoTallaGrid").jqGrid('setGridParam',{
                url:base_url + "/administrador_catalogos/producto_tallas/operations?oper=load&idProducto=" + 0,
                page:1
            });
            $("#productoTallaGrid").jqGrid('setGridParam',{
                editurl: "" ,
                page:1
            }).trigger('reloadGrid');
            
            $("#productoColorGrid").jqGrid('setGridParam',{
                url:base_url + "/administrador_catalogos/producto_colores/operations?oper=load&idProducto=" + 0,
                page:1
            });
            $("#productoColorGrid").jqGrid('setGridParam',{
                editurl: "" ,
                page:1
            }).trigger('reloadGrid');
        },
        onSelectRow : function (id) {
            $("#productoTallaGrid").jqGrid('setGridParam',{
                url:base_url + "/administrador_catalogos/producto_tallas/operations?oper=load&idProducto=" + id,
                page:1
            });
            $("#productoTallaGrid").jqGrid('setGridParam',{
                editurl:base_url + "/administrador_catalogos/producto_tallas/operations?idProducto=" + id,
                page:1
            }).trigger('reloadGrid');
            $("#productoColorGrid").jqGrid('setGridParam',{
                url:base_url + "/administrador_catalogos/producto_colores/operations?oper=load&idProducto=" + id,
                page:1
            });
            $("#productoColorGrid").jqGrid('setGridParam',{
                editurl:base_url + "/administrador_catalogos/producto_colores/operations?idProducto=" + id,
                page:1
            }).trigger('reloadGrid');
        }
    });
    
    $("#productoGrid").jqGrid(
        "navGrid",
        "#productoPager",
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
        }, editProductoOptions, addProductoOptions);
        
    $("#productoGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
    
    $("#productoTallaGrid").jqGrid({
        colNames: ["id","Talla"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "idTalla",
            index: "idTalla",
            edittype: "select",
            align: "center",
            editable: true,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/tallas"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/tallas"
            },
            width: 330
        }
        ],
        url : base_url + "/administrador_catalogos/producto_tallas/operations?oper=load",
        editurl : base_url + "/administrador_catalogos/producto_tallas/operations",
        datatype : "json",
        caption : "Lista de tallas disponibles",
        pager : "#productoTallaPager",
        sortname : "idProducto",
        rowNum : 10,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        rownumbers : true,
        height : "200px",
        hidegrid: true,
        jsonReader : {
            repeatitems : false
        }
    });
    
    $("#productoTallaGrid").jqGrid(
        "navGrid",
        "#productoTallaPager",
        {
            edit: false,
            add: true,
            del: true,
            search: false,
            view: false
        },
        {/* addOptions */}, 
        {/* editOptions */});
        
    var addProductoColorOptions  = {
        /* editOptions */
        width: 450,
        addCaption: "Agregar un producto",
        editCaption: "Modificar producto",
        bSubmit: "Guardar producto",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
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
            $("<button id='buttonSubirImagenProductoColor'>Subir</button><button id='eliminarImagenProductoColor'>Eliminar</button>").insertAfter("#subirImagenProductoColor",formid);
            $("#imagenProductoColor").hide();
            $("#eliminarImagenProductoColor").button().click(function (){
                $("#verImagenProductoColor").html("");
                $("#imagenProductoColor").val("");
            });
            $("<div id='verImagenProductoColor'></div>").insertAfter("#imagenProductoColor",formid);
            $("#verImagenProductoColor").html("");
            $("#buttonSubirImagenProductoColor",formid).button().click(function(){
                var subirImagen = $("#subirImagenProductoColor").val();
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
                        url: base_url + "/util/subir/index/subirImagenProductoColor",
                        secureuri: false,
                        fileElementId:"subirImagenProductoColor",
                        dataType: "json",
                        success: function (data, status) {
                            $.unblockUI();
                            if(typeof(data.error) != "undefined")
                            {
                                if(data.error != "")
                                {
                                    alert(data.error);
                                }else{
                                    $("#imagenProductoColor").val(data.msg);
                                    $("#verImagenProductoColor").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                                }
                            }
                        }
                    });
                } else {
                    $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                    $("#alerta").dialog("open");
                    $("#verImagenProductoColor").val("");
                }
            });
        },
        afterShowForm : function () {
            $("#verImagenProductoColor").html("");
        },
        afterComplete : function () {
            $("#verImagenProductoColor").html("");
        }
    };
    
    var editProductoColorOptions = {
        /* editOptions */
        width: 450,
        addCaption: "Agregar un producto",
        editCaption: "Modificar producto",
        bSubmit: "Guardar producto",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
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
            $("<button id='buttonSubirImagenProductoColor'>Subir</button><button id='eliminarImagenProductoColor'>Eliminar</button>").insertAfter("#subirImagenProductoColor",formid);
            $("#imagenProductoColor").hide();
            $("#eliminarImagenProductoColor").button().click(function (){
                $("#verImagenProductoColor").html("");
                $("#imagenProductoColor").val("");
            });
            $("<div id='verImagenProductoColor'></div>").insertAfter("#imagenProductoColor",formid);
            $("#verImagenProductoColor").html("");
            $("#buttonSubirImagenProductoColor",formid).button().click(function(){
                var subirImagen = $("#subirImagenProductoColor").val();
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
                        url: base_url + "/util/subir/index/subirImagenProductoColor",
                        secureuri: false,
                        fileElementId:"subirImagenProductoColor",
                        dataType: "json",
                        success: function (data, status) {
                            $.unblockUI();
                            if(typeof(data.error) != "undefined")
                            {
                                if(data.error != "")
                                {
                                    alert(data.error);
                                }else{
                                    $("#imagenProductoColor").val(data.msg);
                                    $("#verImagenProductoColor").html("<img src='"+data.msg+"' style='border: none;' height='80px' width='100px'/>");
                                }
                            }
                        }
                    });
                } else {
                    $("#mensajeAlerta").html("Tipo de archivo no valido, solo se permite .jpg, .jpeg, .gif, .png");
                    $("#alerta").dialog("open");
                    $("#verImagenProductoColor").val("");
                }
            });
        },
        afterShowForm : function () { 
            var id = $("#productoColorGrid").jqGrid("getGridParam", "selrow");
            var row = $("#productoColorGrid").jqGrid("getRowData", id);
            $("#verImagenProductoColor").html(row.imagenHtmlProducto);
        },
        afterComplete : function () {
            $("#verImagenProductoColor").html("");
        }
    };
        
    $("#productoColorGrid").jqGrid({
        colNames: ["id","Color", "Imagen", "", "Imagen"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "idColor",
            index: "idColor",
            edittype: "select",
            align: "center",
            editable: true,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/colores"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/colores"
            },
            width: 150
        },
        {
            name: "subirImagenProductoColor",
            index: "subirImagenProductoColor",
            editable: true,
            edittype: "file",
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "imagenProductoColor",
            index: "imagenProductoColor",
            editable: true,
            editoptions:{
                size: 65
            },
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "imagenHtmlProductoColor",
            index: "imagenHtmlProductoColor",
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
        url : base_url + "/administrador_catalogos/producto_colores/operations?oper=load",
        editurl : base_url + "/administrador_catalogos/producto_colores/operations",
        datatype : "json",
        caption : "Lista de colores disponibles",
        pager : "#productoColorPager",
        sortname : "idProducto",
        rowNum : 10,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        rownumbers : true,
        height : "200px",
        hidegrid : true,
        jsonReader : {
            repeatitems : false
        }
    });
    
    $("#productoColorGrid").jqGrid(
        "navGrid",
        "#productoColorPager",
        {
            edit: false,
            add: true,
            del: true,
            search: false,
            view: false
        },
        editProductoColorOptions, 
        addProductoColorOptions);
        
    $("#detalleProducto").tabs();
});