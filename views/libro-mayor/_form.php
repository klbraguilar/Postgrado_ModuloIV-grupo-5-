<?php

use app\models\Plancuentas;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\LibroMayor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libro-mayor-form">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'fechainicio')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>

            <?= $form->field($model, 'fechafin')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
            
            <?= $form->field($model, 'idcuenta')->dropDownList(ArrayHelper::map(Plancuentas::find()->Where(['nivel' => 5])->all(),'id','nombre'),
                [
                    'prompt' => 'Seleccionar CodPadre',
                    'class'=>'btn btn-info dropdown-toggle'
                ]); ?>


            <div class="form-group" align="center">
                <?= Html::submitButton('Generar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
