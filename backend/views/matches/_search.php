<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MatchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'round') ?>

    <?= $form->field($model, 'team_a_id') ?>

    <?= $form->field($model, 'score_a') ?>

    <?php // echo $form->field($model, 'team_b_id') ?>

    <?php // echo $form->field($model, 'score_b') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
