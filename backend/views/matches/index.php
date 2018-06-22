<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Matches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'date',
                'format' => ['date', 'php:D d, H:i']
            ],
            'round',
            /*[
                'attribute' => 'team_a_id',
                'value' => 'teamNameA.flagimg',
                'format' => 'raw'
            ],*/
            'teamNameA.name',
            'score_a',
            'teamNameB.name',
            'score_b',
            //'notes:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
