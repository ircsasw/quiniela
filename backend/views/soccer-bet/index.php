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

</div>

