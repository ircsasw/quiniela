<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (Yii::$app->user->isGuest) { ?>

    <div class="jumbotron">
        <h1>Mundial Rusia 2018!</h1>

        <p class="lead">Registrate o inicia sesión para participar.</p>

        <p>
            <?= Html::a(Yii::t('app', 'Registrar'), ['/site/signup'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Entrar'), ['/site/login'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <?php } else { ?>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Resultados Partidos</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

            </div>
            <div class="col-lg-6">
                <h2>Resultados Quinielas</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

            </div>
        </div>

    </div>

    <?php } ?>
</div>
