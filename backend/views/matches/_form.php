<?php

use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use kartik\touchspin\TouchSpin;


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Matches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matches-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'team_a_id')->widget(Select2::class, [
                'data' => $teamsList,
                'options' => ['placeholder' => 'Seleccionar equipo'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>

        <div class="col-sm-3">
            <?php
            echo $form->field($model, 'score_a')->widget(TouchSpin::class, [
                'options' => ['placeholder' => ''],
            ]);
            ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'team_b_id')->widget(Select2::class, [
                'data' => $teamsList,
                'options' => ['placeholder' => 'Seleccionar equipo'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>

        <div class="col-sm-3">
            <?php
            echo $form->field($model, 'score_b')->widget(TouchSpin::class, [
                'options' => ['placeholder' => ''],
            ]);
            ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'date')->widget(DateTimePicker::class, [
                'options' => ['placeholder' => 'Ingrese fecha'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'notes')->textarea() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'round')->textInput() ?>
        </div>

        <div class="col-sm-12">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>