<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\SoccerBetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quinielas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soccer-bet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'date',
            'total_points',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
