<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Panel de administrador';
?>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<div class="site-index">

    <div class="jumbotron">
        <h1>Panel de administración</h1>

        <p class="lead">He aquí los estados más recientes.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usuarios registrados</span>
                  <span class="info-box-number"><?= $totalUsers; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fab fa-wpforms"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Quinielas registradas</span>
                  <span class="info-box-number"><?= $totalBets; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fas fa-user-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Máx. puntuación quiniela</span>
                  <span class="info-box-number"><?php foreach ($maxBets as $maxBet) {
                      echo "<h4>Usuario: " . $maxBet->user->username . "<br> Puntos: " . $maxBet->total_points. "</h4>";
                  };?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fas fa-user-minus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Min. puntuación en quiniela</span>
                  <span class="info-box-number"><?php foreach ($minBets as $minBet) {
                      echo "<h4>Usuario <i>: " . $minBet->user->username . "<br> Puntos: " . $minBet->total_points. "</h4>";
                  };?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="col-lg-5">
            <h2>Puntajes más altos</h2>
            <ul class="list-group">
                <?php
                    foreach ($topFiveBets as $topFiveBet) {
                        echo "<li class='list-group-item d-flex justify-content-between
                        align-items-center'>".$topFiveBet->user->username." --   <i> Quiniela no.: ".$topFiveBet->id ."</i> <span class='badge badge-primary badge-pill'>".$topFiveBet->total_points."</span> </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
