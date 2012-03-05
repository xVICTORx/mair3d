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
        url: base_url + "/welcome/tree",
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

    $("#realizarPedido").button().click(function (){
        $.ajax({
            url: base_url + "/carrito/welcome/checkout",
            type: "post",
            datatype: "html",
            success: function(data) {
                $("#pedido").html(data);
                $("#pedido").dialog("open");
            }
        });
    });

    $(".removeProducto").button();

    $(".qtySpinner").spinner({
        min: 1,
        max: 100
    });

    $('#buscar').button({icons: {primary: 'ui-icon-search'}}).click(function() {
        window.location = base_url + "/welcome/buscar/" +$('#buscador').val();
    });

    $("#pedido").dialog({
        modal: true,
        autoOpen: false,
        show: "fold",
        hide: "fold",
        width: "auto",
        height: "auto"
    });
});

function removeProducto(rowid) {
    $.ajax({
        url: base_url + "/carrito/welcome/removeProducto/" + rowid,
        data: {},
        datatype: "html",
        success: function (data) {
            location.reload(1);
        }
    });
}

function updateProducto(rowid) {
    var cantidad = $("#" + rowid).val();
    if(cantidad >= 1) {
         $.ajax({
            url: base_url + "/carrito/welcome/updateProducto/" + rowid,
            data: {cantidad : cantidad},
            type: "post",
            datatype: "html",
            success: function (data) {
                location.reload(1);
            }
        });
    }
}