<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Quiniela World Cup';

$fecha_actual = strtotime(date('d-m-Y H:i:00', time()));
$fecha_entrada = strtotime('14-06-2018 10:00:00');
//$fecha_entrada = $fecha_actual;   // comentar para bloquear
?>
<div class="site-index">

    <?php if (Yii::$app->user->isGuest) { ?>

    <div class="jumbotron">
        <h1>¡Mundial Rusia 2022!</h1>

        <p class="lead">Regístrate o inicia sesión para participar.</p>

        <p class="btn-group">
            <?= Html::a(Yii::t('app', 'Registro'), ['/site/signup'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Entrar'), ['/site/login'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <?php } else { ?>

    <div class="jumbotron">
        <h1>¡Mundial Rusia 2022!</h1>

        <p class="lead">Administra y crea tus quinielas.</p>

        <p class="btn-group">
            <?= Html::a(Yii::t('app', 'Mis quinielas'), ['/soccer-bet/mybets'], ['class' => 'btn btn-lg btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Quinielas'), ['/soccer-bet/index'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <h2>Resultados de los partidos</h2>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'responsiveWrap' => false,
                'pjax' => true,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'match_id',
                        'value' => 'matchResultRaw',
                        'format' => 'raw'
                    ],
                ],
            ]); ?>

        </div>
        <div class="col-lg-5">
            <h2>Puntajes más altos</h2>
            <ul class="list-group">
            <?php if ($fecha_actual >= $fecha_entrada) { ?>

                <?php
                    foreach ($topFiveBets as $topFiveBet) {
                        echo "<li class='list-group-item d-flex justify-content-between
                        align-items-center'>".$topFiveBet->user->username." <i> (# ".$topFiveBet->id .") </i> <span class='badge badge-primary badge-pill'>".$topFiveBet->total_points."</span> </li>";
                    }
                ?>

            <?php } else { ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    El primero, podrías ser tu...
                    <span class="badge badge-primary badge-pill">20</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    El segundo usuario más alto...
                    <span class="badge badge-primary badge-pill">10</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    El tercero pero no menos importante...
                    <span class="badge badge-primary badge-pill">5</span>
                </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    Otros más...
                    <span class="badge badge-primary badge-pill">5</span>
                </li>

            <?php } ?>
            </ul>
        </div>
        <div class="reglas col-lg-5">
            <blockquote>
                <p>La forma de determinar cuántos puntos gana cada quien es la siguiente:</p>
                <ul>
                    <li class="text-primary">
                        El que acierte al marcador recibe <span class="badge badge-primary badge-pill">5</span> puntos
                    </li>
                    <li class="text-primary">
                        El que acierte al resultado pero no al marcado se lleva <span class="badge badge-primary badge-pill">3</span> puntos
                    </li>
                    <li class="text-primary">El que no acierta nada no se lleva nada</li>
                </ul>
                <p>Al final de todos los partidos el que tenga más puntos se lleva todo el dinero, en caso de que haya empate se reparte en partes iguales entre todos los ganadores.</p>
                <footer>Reglas del juego</footer>
            </blockquote>
        </div>
    </div>

    <?php } ?>
</div>
