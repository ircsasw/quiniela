<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SoccerBet */

$this->title = 'Folio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quinielas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soccer-bet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-3">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'user.username',
                    'date',
                    'total_points',
                ],
            ]) ?>

        </div>
        <div class="col-lg-9">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'responsiveWrap' => false,
                //'filterModel' => $searchModel,
                'pjax' => true,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'score_a',
                        'hAlign' => 'right',
                        'vAlign' => 'middle',
                        'width' => '60px',
                    ],
                    [
                        'attribute' => 'match_id',
                        'value' => 'match.matchRaw',
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'score_b',
                        'hAlign' => 'left',
                        'vAlign' => 'middle',
                        'width' => '60px',
                    ],
                    'points',
                ],
            ]); ?>

        </div>
    </div>


</div>
