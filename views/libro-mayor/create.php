<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LibroMayor */

$this->title = 'Generar Libro Mayor';
$this->params['breadcrumbs'][] = ['label' => 'Libro Mayor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libro-mayor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
