<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SoccerBet */

$this->title = Yii::t('app', 'Create Soccer Bet');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Soccer Bets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soccer-bet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
