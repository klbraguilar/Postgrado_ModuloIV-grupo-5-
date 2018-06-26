<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibroMayorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Libro Mayors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-mayor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Libro Mayor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idlibromay',
            'fechainicio',
            'fechafin',
            'idcuenta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
