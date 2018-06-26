<?php
/* @var $usuarios app\models\Usuarioempresa[] */
use yii\helpers\Html;
$debe = 0;
$haber = 0;
$acreedor = 0;
$deudor = 0;
?>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="6"><h2 class="text-center">Balance de Sumas y Saldos</h2></th>
        </tr>
        <tr>
            <th colspan="6"><h3 class="text-center">Del <?php echo $inicio ?> hasta el <?php echo $fin ?></h3></th>
        </tr>
        <tr>
            <th>Cuenta</th>
            <th>Nombre</th>
            <th>Debe</th>
            <th>Haber</th>
            <th>Deudo</th>
            <th>Acreedor</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($results as $result): ?>
            <tr>
                <td><?= $result['cuenta'] ?></td>
                <td><?= $result['nombre'] ?></td>
                <td><?= $result['Debe'] ?></td>
                <td><?= $result['Haber'] ?></td>
                <td><?= $result['Deudor'] ?></td>
                <td><?= $result['Acreedor'] ?></td>
                <?php
                $debe += $result['Debe'];
                $haber += $result['Haber'];
                $deudor += $result['Deudor'];
                $acreedor += $result['Acreedor'];
                ?>

            </tr>
        <?php endforeach; ?>
            <tr>
                <td></td>
                <td><strong>TOTALES </strong></td>
                <td><?= $debe ?></td>
                <td><?= $haber ?></td>
                <td><?= $deudor ?></td>
                <td><?= $acreedor ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <p class="text-right"><strong>TOTAL DEBE: </strong><?= $debe ?></p>
    <p class="text-right"><strong>TOTAL HABER: </strong><?= $haber ?></p>
    <p class="text-right"><strong>TOTAL DEUDOR: </strong><?= $deudor ?></p>
    <p class="text-right"><strong>TOTAL ACREEDOR: </strong><?= $acreedor ?></p>
</div>