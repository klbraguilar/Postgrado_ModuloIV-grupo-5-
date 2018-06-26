<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoResultado */

$this->title = 'Update Estado Resultado: ' . $model->idestadores;
$this->params['breadcrumbs'][] = ['label' => 'Estado Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestadores, 'url' => ['view', 'id' => $model->idestadores]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-resultado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
