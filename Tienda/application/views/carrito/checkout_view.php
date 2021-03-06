<script>
    $(document).ready(function() {
        $("#cancel").button({

        }).click(function() {
            $("#pedido").dialog("close");
        });

        $("#confirm").button({

        }).click(function () {
            $.blockUI({css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .4,
                    color: '#fff'
                }, message: '<h3>Procesando, por favor espere...</h3>', baseZ: 9999});
            $.ajax({
                url: base_url + "/carrito/welcome/process",
                data: {},
                async: true,
                datatype: "html",
                success: function (data) {
                    $.unblockUI();
                    $("#pedido").html(data);
                }
            });
        });

    });
</script>
<div style="width: 600px; height: auto;">
    <?php if (count($productos) > 0): ?>
        <table style="width: 100%;">
            <tr>
                <td><strong>Producto</strong></td>
                <td><strong>Color</strong></td>
                <td><strong>Talla</strong></td>
                <td><strong>Cantidad</strong></td>
                <td><strong>Precio</strong></td>
                <td><strong>Subtotal</strong></td>
            </tr>
            <?php
            $subtotal = 0;
            foreach ($productos as $key => $producto):
                ?>
                <tr>
                    <td><?php echo $producto["name"] ?></td>
                    <td><?php echo $producto["options"]["color"] ?></td>
                    <td><?php echo $producto["options"]["talla"] ?></td>
                    <td><?php echo $producto["qty"] ?></td>
                    <td>$<?php echo $producto["price"] ?></td>
                    <td>$<?php echo $producto["price"] * $producto["qty"] ?></td>
                </tr>

                <?php
                $subtotal += $producto["price"] * $producto["qty"];
            endforeach;
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong class="descuento">Subtotal:</strong></td>
                <td><strong class="descuento">$<?php echo number_format($subtotal, 2); ?></strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong class="descuento">I.V.A.:</strong></td>
                <td><strong class="descuento">$<?php echo number_format(($subtotal) * .16, 2); ?></strong></td>
            </tr>
            <?php if ($descuento > 0): ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong class="descuento">Descuento:</strong></td>
                    <td><strong class="descuento">$<?php echo number_format(($subtotal * ($descuento / 100)), 2); ?></strong></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><strong class="precio">Total:</strong></td>
                <td><strong class="precio">$<?php echo number_format(($subtotal - ($subtotal * ($descuento / 100))) + ($subtotal) * .16, 2); ?></strong></td>
            </tr>
        </table>
        <h3 class="tituloMediano2 ui-widget-header ui-corner-top">Datos de entrega</h3>
        <table>
            <tr>
                <td><strong>Nombre:</strong></td>
                <td><?php echo $cliente->getNombre() . " " . $cliente->getApPaterno() . " " . $cliente->getApMaterno(); ?></td>
            </tr>
            <tr>
                <td><strong>Correo:</strong></td>
                <td><?php echo $cliente->getEmail(); ?></td>
            </tr>
            <?php if ($cliente->getCalleEnvio() != "" && $cliente->getCalleEnvio() != " "): ?>
                <tr>
                    <td><strong>Direccion:</strong></td>
                    <td><?php echo $cliente->getCalleEnvio() . " Int: " . $cliente->getNumeroIntEnvio() . " Ext:" . " " . $cliente->getNumeroExtEnvio() . " " . " " . $cliente->getColoniaEnvio() . ", " . $cliente->getMunicipioEnvio() . ", " . $cliente->getEstadoEnvio() . ", " . " CP: " . $cliente->getCpEnvio(); ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td><strong>Direccion:</strong></td>
                    <td><?php echo $cliente->getCalle() . " " . $cliente->getNumero() . " " . $cliente->getColonia() . ", " . $cliente->getMunicipio() . ", " . $cliente->getEstado() . ", " . " CP: " . $cliente->getCp(); ?></td>
                </tr>
            <?php endif; ?>
        </table>
        <table style="float: right;">
            <td><button id="confirm">Confirmar</button></td>
            <td><button id="cancel">Cancelar</button></td>
        </table>
    <?php else: ?>
        <h3>No tiene productos que comprar</h3>
        <table style="float: right;">
            <td><button id="cancel">Cancelar</button></td>
        </table>
    <?php endif; ?>
</div>