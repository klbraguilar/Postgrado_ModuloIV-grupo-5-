<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BalanceGeneral */

$this->title = $model->idbalance;
$this->params['breadcrumbs'][] = ['label' => 'Balance Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-general-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idbalance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idbalance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idbalance',
            'fechainicio',
            'fechafin',
        ],
    ]) ?>

</div>
