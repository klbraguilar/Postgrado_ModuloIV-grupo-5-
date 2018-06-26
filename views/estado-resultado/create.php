<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoResultado */

$this->title = 'Generar Estado Resultado';
$this->params['breadcrumbs'][] = ['label' => 'Estado Resultado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-resultado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
