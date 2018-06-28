<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SoccerBet */
$this->title = 'Folio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mis quinielas'), 'url' => ['mybets']];
$this->params['breadcrumbs'][] = $this->title;
$fecha_actual = strtotime(date('d-m-Y H:i:00', time()));
$fecha_entrada = strtotime('30-06-2018 09:00:00');
//$fecha_entrada = $fecha_actual;   // comentar para bloquear
$sololectura = ( ($fecha_actual >= $fecha_entrada) ? true : false );
?>

<?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir quiniela', ['bet-pdf', 'id' => $model->id], [
    'class'=>'btn btn-success', 
    'target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Se generará un PDF listo para imprimir en otra ventana.'
]); ?>

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
                //'responsiveWrap' => false,
                //'filterModel' => $searchModel,
                'pjax' => true,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'score_a',
                        'readonly' => $sololectura,
                        'editableOptions' => [
                            'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                            'options' => ['pluginOptions' => ['min' => 0, 'max' => 50]]
                        ],
                        'hAlign' => 'right',
                        'vAlign' => 'middle',
                        'width' => '60px',
                    ],
                    [
                        'attribute' => 'match_id',
                        'value' => 'match.matchRaw',
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'text-center'],
                        'headerOptions' => ['class' => 'text-center']
                    ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'score_b',
                        'readonly' => $sololectura,
                        'editableOptions' => [
                            'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                            'options' => ['pluginOptions' => ['min' => 0, 'max' => 50]]
                        ],
                        'hAlign' => 'left',
                        'vAlign' => 'middle',
                        'width' => '60px',
                    ],
                    'points',
                ],
            ]); ?>
    </div>
</div>
