$(document).ready(function (){
    $("#tabsCatalogos").tabs({
        select: function(event, ui) { 
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
                message: "<h3>Cargando, por favor espere...</h3>"
            });
        },
        ajaxOptions: {
            success: function() {
                $.unblockUI();
            }
        }  
    });
});
