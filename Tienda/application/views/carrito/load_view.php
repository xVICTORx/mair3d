<h3 class="tituloMediano2 ui-widget-header ui-corner-top">Carrito</h3>
<?php if (count($productos) > 0): ?>
    <table style="width:  100%;">
        <?php foreach ($productos as $key => $producto): ?>
            <tr>
                <td>x<?php echo $producto["qty"]; ?></td>
                <td><?php echo $producto["options"]["imagen"] ?></td>
                <td><?php echo substr($producto["name"], 0, 5) ?>...</td>
                <td><?php echo substr($producto["options"]["color"], 0, 3) ?>.</td>
                <td><?php echo substr($producto["options"]["talla"], 0, 2) ?>.</td>

                <td><button class="removeProducto" onclick="removeProducto('<?php echo $producto["rowid"]; ?>')">Quitar</button></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table style="width:  100%;">
        <tr>
            <td><button  id="checkOut" class="botonLargo">Comprar ahora</button></td>
        </tr>
    </table>
<?php else: ?>
    <h3 class="textoChico ui-corner-all">Su carrito esta vacio</h3>
<?php endif; ?>
