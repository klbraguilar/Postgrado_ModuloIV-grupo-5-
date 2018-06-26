<?php
/* @var $usuarios app\models\Usuarioempresa[] */
use yii\helpers\Html;
$debe = 0;
$haber = 0;
$acumulador = 0;
?>

<div class="table-responsive">
    <table class="table table-bordered" id="Exportar_a_Excel">
        <thead>
            <tr>
                <th colspan="6"><h2 class="text-center">Libro Mayor</h2></th>
            </tr>
            <tr>
                <th colspan="6"><h3 class="text-center">Del <?php echo $inicio ?> hasta el <?php echo $fin ?></h3></th>
            </tr>
            <tr>
                <th colspan="6"><h3 class="text-center">Cuenta : <?php echo $cuenta ?></h3></th>
            </tr>
            <tr>
            <th>Fecha</th>
            <th>COMP</th>
            <th>Glosa</th>
            <th>Debe</th>
            <th>Haber</th>
            <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result): ?>
                <tr>
                    <td><?= $result['fecha'] ?></td>
                    <td><?= $result['id'] ?></td>
                    <td><?= $result['glosa'] ?></td>
                    <td><?= $result['debe'] ?></td>
                    <td><?= $result['haber'] ?></td>
                    <td><?= $acumulador += $result['debe'] - $result['haber'] ?></td>
                    <?php
                    $debe += $result['debe'];
                    $haber += $result['haber'];
                    ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Totales</strong></td>
                <td><?= $debe ?></td>
                <td><?= $haber ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <form action="../web/ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
        <p>Exportar a Excel  <img src="favicon.ico" class="botonExcel" /></p>
        <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
    </form>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<script language="javascript">
    $(document).ready(function() {
        $(".botonExcel").click(function(event) {
            $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
            $("#FormularioExportacion").submit();
        });
    });
</script>