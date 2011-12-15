<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Testeando DAO: <?php echo $dao; ?>....</h1>
        <table align="center" style="border: solid 1px;" cellpadding="10px" cellspacing="0px">
            <tr style="text-align: center;">
                <td style="width: 50px; border: solid 1px;">Numero</td>
                <td style="width: 100px; border: solid 1px;">Metodo</td>
                <td style="width: 500px; border: solid 1px;">Query</td>
                <td style="width: 300px; border: solid 1px;">Resultado</td>
            </tr>
            <?php foreach($pruebas as $key => $prueba): ?>
            <tr>
                <td style="color: #990000; border: solid 1px #000000; text-align: center">
                    <?php echo $key + 1; ?>
                </td>
                <td style="color: #003399; border: solid 1px #000000; text-align: center">
                    <?php echo $prueba->metodo; ?>
                </td>
                <td style="color: limegreen; border: solid 1px #000000;">
                    <?php echo $prueba->query; ?>
                </td>
                <td style="color: blueviolet; border: solid 1px #000000;">
                    <?php var_dump($prueba->resultado); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
