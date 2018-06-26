<?php
/* @var $usuarios app\models\Usuarioempresa[] */
use yii\helpers\Html;
$activo = 0;
$pasivo = 0;
$patrimonio = 0;
$resultado = $resultados;

?>
<div class="balance-general-form">

    <div class="table-responsive">
        <table class="table table-bordered" id="Exportar_a_Excel">
            <thead>
            <tr>
                <th colspan="6"><h2 class="text-center">Balance General</h2></th>
            </tr>
            <tr>
                <th colspan="6"><h3 class="text-center">Del <?php echo $inicio ?> hasta el <?php echo $fin ?></h3></th>
            </tr>
            <tr>
            <th>Cuenta</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Saldo</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($results as $result): ?>
                <tr>
                    <td><?= $result['cuenta'] ?></td>
                    <td><?= $result['nombre'] ?></td>
                    <td><?= $result['nivel'] ?></td>
                    <td><?= $result['balance'] ?></td>
                    <?php
                        $a = strcmp(trim($result['nombre']),"ACTIVO");
                        if($a === 0){
                            $activo = $result['balance'];
                        }
                        $p = strcmp(trim($result['nombre']),"PASIVO");
                        if($p === 0){
                            $pasivo = $result['balance'];
                        }
                        $pt = strcmp(trim($result['nombre']),"PATRIMONIO");
                        if($pt === 0){
                            $patrimonio = $result['balance'];
                        }

                    ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php $total = $pasivo + $patrimonio - $resultado; ?>
        <p class="text-right"><strong>Total PASIVO + PATRIMONIO + RESULTADO : </strong> <?= $total ?></p>
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
</div>