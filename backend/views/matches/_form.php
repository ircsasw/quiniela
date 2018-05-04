<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Matches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'round')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_a_id')->textInput() ?>

    <?= $form->field($model, 'score_a')->textInput() ?>

    <?= $form->field($model, 'team_b_id')->textInput() ?>

    <?= $form->field($model, 'score_b')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
