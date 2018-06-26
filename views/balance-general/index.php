<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BalanceGeneralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Balance General';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-general-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Balance General', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idbalance',
            'fechainicio',
            'fechafin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
