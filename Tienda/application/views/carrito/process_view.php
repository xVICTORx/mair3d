<script>
    $(document).ready(function() {
       $("#pedido").dialog({
           close: function() {
               window.location = base_url + "/welcome";
           }
       })
    });
</script>
<div style="width: 300px; height: auto;">
    <h3 class="tituloMediano">
        Tu pedido se ha registrado correctamente, te llegara un correo electronico con los datos de tu pedido
        <br/>
    </h3>
</div>