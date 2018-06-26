<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SumasySaldos */

$this->title = $model->idsumasaldos;
$this->params['breadcrumbs'][] = ['label' => 'Sumasy Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sumasy-saldos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idsumasaldos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idsumasaldos], [
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
            'idsumasaldos',
            'fechainicio',
            'fechafin',
        ],
    ]) ?>

</div>
