<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LibroMayor */

$this->title = $model->idlibromay;
$this->params['breadcrumbs'][] = ['label' => 'Libro Mayors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-mayor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idlibromay], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idlibromay], [
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
            'idlibromay',
            'fechainicio',
            'fechafin',
            'idcuenta',
        ],
    ]) ?>

</div>
