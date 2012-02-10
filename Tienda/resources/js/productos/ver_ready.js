$(document).ready(function () {
    
    $("#cantidad").spinner({
        min: 1, 
        max: 100
    });
    
    $(".imagenColor").hover(
        function() {
            $(this).animate({
                width: "120px", 
                height:"120px"
            }, 100);
        }
        ,
        function() {
            $(this).animate({
                width: "80px", 
                height:"80px"
            }, 100);
        }
        );
    $(".imagenColorAgrandable").hover(
        function() {
//            $(this).animate({
//                width: "120px", 
//                height:"120px"
//            }, 100);
             $(".imagenProductoGrande").attr("src", $(this).attr("src"));
        }
        ,
        function() {
//            $(this).animate({
//                width: "80px", 
//                height:"80px"
//            }, 100);
        }
        ).click(
        function (){
            $(".imagenProductoGrande").attr("src", $(this).attr("src"));
        }
        ).css("cursor", "pointer");
            
    $("#agregarCarrito").button({
        icons: {
            primary : "ui-icon-cart"
        }
    }).click(function () {
        addProducto();
    });
    
    $("#checkOut").button().click(function () {
        window.location = base_url + "/carrito";
    });
    
    $(".removeProducto").button();
    
    $(".imagenProductoGrande").click(function() {
        window.open($(this).attr("src"));
    }).css("cursor", "pointer");
    
});

function removeProducto(rowid) {
    $.ajax({
        url: base_url + "/carrito/welcome/removeProducto/" + rowid,
        data: {},
        datatype: "html",
        success: function (data) {
            $("#carrito").html(data);
            $(".removeProducto").button();
            $("#checkOut").button().click(function () {
                window.location = base_url + "/carrito";
            });
        }
    });
}

function addProducto() {
    var data = new Object();
    data.idProducto = $("#idProducto").val();
    data.idColor = $("#idColor").val();
    data.idTalla = $("#idTalla").val();
    data.talla = $("select#idTalla  option:selected").text();
    data.color = $("select#idColor  option:selected").text();
    data.precio = $("#precio").val();
    data.cantidad = $("#cantidad").val();
    $.ajax({
        data: data,
        type: "post",
        url: base_url + "/carrito/welcome/add",
        success: function(){
            reloadCarrito();
        }
    });
}

function reloadCarrito() {
    $.ajax({
        url: base_url + "/carrito/welcome/load",
        data: {},
        datatype: "html",
        success: function (data) {
            $("#carrito").html(data);
            $(".removeProducto").button();
            $("#checkOut").button().click(function () {
                window.location = base_url + "/carrito";
            });
        }
    });
}

function cambiaImagen(imagen) {
    if(imagen != "") {
        $(".imagenProductoGrande").attr("src", imagen);
    }
}