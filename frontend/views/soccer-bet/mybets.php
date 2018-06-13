<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\SoccerBetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mis quinielas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soccer-bet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear una quiniela', ['create'], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '¿Desea crear nueva quiniela?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'id',
                'date:date',
                'total_points',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'contentOptions' => ['class' => 'action-buttons'],
                'buttons' => [
                        'delete' => function ($url, $model) {
                            $actual_date = strtotime(date('d-m-Y H:i:00', time()));
                            $start_date = strtotime('14-06-2018 10:00:00');
                            // $start_date = $actual_date; testing de fecha actual
                            // Si la fecha actual es menor a un día antes del mundial se puede seguir borrando nuestra quiniela, una vez 24 hrs antes del mundial esta opción queda anulada para que la apuesta prosiga todo el transcurso.
                            return ($actual_date < $start_date) ? Html::a('<i class="glyphicon glyphicon-remove"></i>',
                                $url, [
                                'title' => Yii::t('app', 'Eliminar'),
                                'class' => 'red',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Seguro que quiere eliminar este registro?'),
                                    'method' => 'post',
                                ],
                            ]) : "";
                        }
                    ]
                ],
            ],
        ]); 
    ?>
</div>

