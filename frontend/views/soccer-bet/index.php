<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\SoccerBetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quinielas');
$this->params['breadcrumbs'][] = $this->title;

$fecha_actual = strtotime(date('d-m-Y H:i:00', time()));
$fecha_entrada = strtotime('30-06-2018 09:00:00');
//$fecha_entrada = $fecha_actual;   // comentar para bloquear
?>
<div class="soccer-bet-index">

<?php if ($fecha_actual >= $fecha_entrada) { ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'id',
                [
                    'attribute' => 'user',
                    'value' => 'user.username'
                ],
                'date:date',
                'total_points',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

<?php } else { ?>

    <div class="jumbotron">
        <p class="lead">Las quinielas de los otros participantes estarán disponibles hasta 1 hora antes del primer partido. Registra tus quinielas antes de esa fecha para que puedas participar.</p>
        <?= Html::a('Mis quinielas »', ['/soccer-bet/mybets'], ['class' => 'btn btn-lg btn-primary']) ?>
    </div>

<?php } ?>
</div>

