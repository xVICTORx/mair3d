$(document).ready(function() {
   $("#descuentoGrid").jqGrid({
        colNames: ["idDescuento", "Monto", "Porcentaje"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "monto",
            index: "monto",
            editable: true,
            align: "center",
            editoptions:{
                size: 30
            },
            editrules: {
                required: true,
                number: true
            },
            width: 100
        },
        {
            name: "porcentaje",
            index: "porcentaje",
            editable: true,
            align: "center",
            editoptions:{
                size: 30
            },
            editrules: {
                required: true,
                number: true,
                maxValue: 100
            },
            width: 100
        }
        ],
        url : base_url + "/descuentos/welcome/operations?oper=load",
        editurl : base_url + "/descuentos/welcome/operations",
        datatype : "json",
        caption : "Lista de descuentos",
        pager : "#descuentoPager",
        sortname : "idDescuento",
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
    
    $("#descuentoGrid").jqGrid(
        "navGrid", 
        "#descuentoPager",
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
        }
    );
    
    $("#descuentoGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    }); 
});