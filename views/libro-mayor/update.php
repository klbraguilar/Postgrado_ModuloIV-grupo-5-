<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LibroMayor */

$this->title = 'Update Libro Mayor: ' . $model->idlibromay;
$this->params['breadcrumbs'][] = ['label' => 'Libro Mayors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idlibromay, 'url' => ['view', 'id' => $model->idlibromay]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="libro-mayor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
