$(document).ready(function (){
    var options = {
        addCaption: "Agregar una categoria",
        editCaption: "Modificar categoria",
        bSubmit: "Guardar categoria",
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
        }
    };
    
    $("#categoriaGrid").jqGrid({
        colNames: ["idCategoria", "Nombre", "Descripción"],
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
                size: 30,
                maxlength: 70
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
                cols: 29,
                rows: 5
            },
            width: 300
        }
        ],
        url : base_url + "/administrador_catalogos/categorias/operations?oper=load",
        editurl : base_url + "/administrador_catalogos/categorias/operations",
        datatype : "json",
        caption : "Lista de categorias disponibles",
        pager : "#categoriaPager",
        sortname : "idCategoria",
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
    
    $("#categoriaGrid").jqGrid(
        "navGrid", 
        "#categoriaPager",
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
        options,
        options
    );
    
    $("#categoriaGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});