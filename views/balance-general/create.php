<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BalanceGeneral */

$this->title = 'Generar Balance General';
$this->params['breadcrumbs'][] = ['label' => 'Balance General', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-general-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
