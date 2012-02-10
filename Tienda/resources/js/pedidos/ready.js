$(document).ready(function () {
    $("#pedidoGrid").jqGrid({
        colNames: ["Numero", "Cliente", "Fecha", "Estatus", "Subtotal", "Envio", "Descuento", "Total"],
        colModel: [
        {
            index: "id",
            name: "id",
            editable: false,
            width: 50
        },
        {
            index: "idCliente",
            name: "idCliente",
            editable: false,
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/clientes"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/clientes"
            },
            width: 200
        },
        {
            index: "fecha",
            name: "fecha",
            editable: false,
            width: 120
        },
        {
            index: "idEstatus",
            name: "idEstatus",
            editable: true,
            edittype: "select",
            align: "center",
            stype: "select",
            search: true,
            editoptions:{
                dataUrl: base_url + "/util/listas/estatus"
            },
            editrules: {
                required: true
            },
            searchoptions: {
                dataUrl: base_url + "/util/listas/estatus"
            },
            width: 100
        },
        {
            index: "subtotal",
            name: "subtotal",
            editable: false,
            search: false,
            width: 80
        },
        {
            index: "envio",
            name: "envio",
            editable: false,
            search: false,
            width: 80
        },
        {
            index: "descuento",
            name: "descuento",
            editable: false,
            search: false,
            width: 80
        },
        {
            index: "total",
            name: "total",
            editable: false,
            search: false,
            width: 80
        }
        ],
        url : base_url + "/pedidos/welcome/operations?oper=load",
        editurl: base_url + "/pedidos/welcome/operations",
        datatype : "json",
        caption : "Lista de pedidos",
        pager : "#pedidoPager",
        sortname : "idPedido",
        rowNum : 10,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        shrinkToFit: true,
        rownumbers : true,
        height : "300px",
        autowidth: true,
        hidegrid : false,
        subGrid : true,
        subGridUrl: base_url + "/pedidos/welcome/loadproductos",
        subGridModel: [{
            name: ["Producto", "Subcategoria", "Color", "Talla", "Precio", "Cantidad","Subtotal"],
            width : [200, 150, 80, 80, 80, 80, 80],
            align: ["center", "center", "center", "center", "center", "center", "center"]
        } 
        ],
        jsonReader : {
            repeatitems : false
        }
    });
    
    $("#pedidoGrid").jqGrid(
        "navGrid",
        "#pedidoPager",
        {
            edit: true,
            edittext: "Editar",
            add: false,
            del: true,
            deltext: "Eliminar",
            search: false,
            view: true,
            viewtext: "Ver",
            refreshtext: "Actualizar"
        });
        
    $("#pedidoGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});