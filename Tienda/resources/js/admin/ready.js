$(document).ready(function() {
    $("#treeMenu").jqGrid({
        colnames: ["Modulo"],
        colModel: [
        {
            name:'id',
            index:'id', 
            width:1,
            hidden:true,
            key:true
        },
        {
            name: "Modulo",
            index: "Modulo",
            width: 190,
            sortable: false
        }
        ],
        url: base_url + "/admin/tree",
        caption: "Menu",
        treedatatype: "xml",
        hidegrid: true,
        treeGrid: true,
        treeGridModel: 'adjacency',
        ExpandColumn : 'Modulo',
        height: "auto",
        pager: false,
        treeIcons:  {
            plus:'ui-icon-plusthick',
            minus:'ui-icon-minusthick',
            leaf:'ui-icon-bullet'
        }
    });
});

function loadModule(url){
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
        message: "<h3>Cargando modulo, por favor espere...</h3>"
    });
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        success: function(data) {
            $.unblockUI();
            $("#modulo").html(data);
        }
    });
}