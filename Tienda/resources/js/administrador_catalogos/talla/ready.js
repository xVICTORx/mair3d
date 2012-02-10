$(document).ready(function (){
    var options = {
        addCaption: "Agregar una talla",
        editCaption: "Modificar talla",
        bSubmit: "Guardar talla",
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
    $("#tallaGrid").jqGrid({
        colNames: ["idTalla", "Talla", "Descripción"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "talla",
            index: "talla",
            editable: true,
            align: "center",
            editoptions:{
                size: 30
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
        url : base_url + "/administrador_catalogos/tallas/operations?oper=load",
        editurl : base_url + "/administrador_catalogos/tallas/operations",
        datatype : "json",
        caption : "Lista de tallas disponibles",
        pager : "#tallaPager",
        sortname : "idTalla",
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
    
    $("#tallaGrid").jqGrid(
        "navGrid", 
        "#tallaPager", 
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
        options);
    
    $("#tallaGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});