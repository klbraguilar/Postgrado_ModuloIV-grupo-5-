<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SumasySaldosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sumasy Saldos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sumasy-saldos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sumasy Saldos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idsumasaldos',
            'fechainicio',
            'fechafin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
