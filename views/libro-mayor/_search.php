<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LibroMayorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libro-mayor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idlibromay') ?>

    <?= $form->field($model, 'fechainicio') ?>

    <?= $form->field($model, 'fechafin') ?>

    <?= $form->field($model, 'idcuenta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
