<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SoccerBet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quinielas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soccer-bet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Está seguro de borrar este elemento?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user.username',
            'date',
            'total_points',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'soccer_bet_id',
            'match_id',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'score_a',
                'value' => function($model){
                    return $model->score_a;
                }
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'score_b',
                'value' => function($model){
                    return $model->score_b;
                }
            ],
            'points',
        ],
    ]); ?>

</div>
