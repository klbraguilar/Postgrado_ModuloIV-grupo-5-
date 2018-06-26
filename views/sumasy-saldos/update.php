<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SumasySaldos */

$this->title = 'Update Sumasy Saldos: ' . $model->idsumasaldos;
$this->params['breadcrumbs'][] = ['label' => 'Sumasy Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsumasaldos, 'url' => ['view', 'id' => $model->idsumasaldos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sumasy-saldos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
