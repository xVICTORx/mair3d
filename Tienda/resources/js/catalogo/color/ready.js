$(document).ready(function (){
    var lastsel;
    $("#colorGrid").jqGrid({
        colNames: ["idColor", "Nombre", "Descripción", "Imagen", "", "Imagen"],
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
                size: 65
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
            name: "subirImagen",
            index: "subirImagen",
            editable: true,
            edittype: "file",
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "imagen",
            index: "imagen",
            editable: true,
            editoptions:{
                size: 65
            },
            hidden: true,
            editrules: {
                edithidden: true
            }
        }
        ,
        {
            name: "imagenHtml",
            index: "imagenHtml",
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
        url : base_url + "/catalogo/colores/operations?oper=load",
        editurl : base_url + "/catalogo/colores/operations",
        datatype : "json",
        caption : "Lista de colores disponibles",
        pager : "#colorPager",
        sortname : "idColor",
        rowNum : 10,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        rownumbers : true,
        height : "300px",
        hidegrid : false,
        jsonReader : {
            repeatitems : false
        }
    }).navGrid("#colorPager", {
        edit: true,
        add: true,
        del: true,
        search: false,
        view: false
    });
    
    $("#colorGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});