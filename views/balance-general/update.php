<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BalanceGeneral */

$this->title = 'Update Balance General: ' . $model->idbalance;
$this->params['breadcrumbs'][] = ['label' => 'Balance Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbalance, 'url' => ['view', 'id' => $model->idbalance]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="balance-general-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
