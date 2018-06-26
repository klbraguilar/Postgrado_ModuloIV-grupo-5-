<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SumasySaldos */

$this->title = 'Generar Balance de Sumas y Saldos';
$this->params['breadcrumbs'][] = ['label' => 'Sumas y Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sumasy-saldos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
