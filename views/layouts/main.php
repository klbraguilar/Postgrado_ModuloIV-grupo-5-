<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">}
    <?php
    if (Yii::$app->user->isGuest) :

        NavBar::begin([
            'brandLabel' => 'Reportes',
            'brandUrl' => Yii::$app->homeUrl,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([

            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Login', 'url' => ['/site/login']],
            ],
        ]);
        NavBar::end();
    endif;
    ?>
    <?php
    if (!Yii::$app->user->isGuest) :
        $iduser = Yii::$app->user->getId();
        $user = \app\models\User::findIdentity($iduser);
        NavBar::begin([

            'brandLabel' => '<span class="glyphicon glyphicon-globe"></span>'.' Reportes',
            'brandUrl' => Yii::$app->homeUrl,

            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        if ($iduser != null){
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    [
                        'label' => 'Libro Mayor',
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-sort-by-order"></span>' . Html::encode('Generar Libro Mayor'), 'url' => ['libro-mayor/create']],
                        ],

                    ],
                    [
                        'label' => 'Sumas y Saldos',
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-sort-by-order"></span>' . Html::encode('Generar Balance de Sumas y Saldos'), 'url' => ['sumasy-saldos/create']],
                        ],

                    ],
                    [
                        'label' => 'Balance  General',
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-sort-by-order"></span>' . Html::encode('Generar Balance General'), 'url' => ['balance-general/create']],
                        ],

                    ],
                    [
                        'label' => 'Estado de Resultados',
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-sort-by-order"></span>' . Html::encode('Generar Estado de Resultados'), 'url' => ['estado-resultado/create']],
                        ],

                    ],
                ],
            ]);
        }
        echo Nav::widget([
            'encodeLabels'=>false,
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                [
                    'label' => '<span class="glyphicon glyphicon-cog"></span>',
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-comment"></span>'.Html::encode(' Soporte Tecnico'), 'url' => ['site/contact'],],

                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                        . Html::submitButton(
                            '<span class="glyphicon glyphicon-user"></span>'.' Salir ('.$user->username.') ',
                            ['class' => 'btn btn-default']
                        )

                        . Html::endForm()
                        . '</li>',

                    ],
                ]
            ],
        ]);

        NavBar::end();
    endif;
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
