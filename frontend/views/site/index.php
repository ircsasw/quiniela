<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (Yii::$app->user->isGuest) { ?>

    <div class="jumbotron">
        <h1>¡Mundial Rusia 2018!</h1>

        <p class="lead">Regístrate o inicia sesión para participar.</p>

        <p>
            <?= Html::a(Yii::t('app', 'Registrar'), ['/site/signup'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Entrar'), ['/site/login'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <?php } else { ?>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Resultados de los partidos de hoy:</h2>
                     <ul class="list-group list-group-flush">
                         <li class="list-group-item">A</li>
                         <li class="list-group-item">B</li>
                         <li class="list-group-item">C</li>
                         <li class="list-group-item">D</li>
                     </ul>
            </div>
            <div class="col-lg-6">
            <h2>Puntajes más altos:</h2>
                <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                         Fulanito de tal
                             <span class="badge badge-primary badge-pill">20</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            El segundo usuario más alto
                                <span class="badge badge-primary badge-pill">12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            El tercero pero no menos importante
                                <span class="badge badge-primary badge-pill">4</span>
                        </li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
