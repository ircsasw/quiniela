<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php
	    $form = ActiveForm::begin();
	    $options = [ 5 => 'Inactivo', 10 => 'Activo'];
    ?>
    <?=  $form->field($model, 'status')
        ->dropDownList(
        	$options,
            ['prompt'=>'Seleccione uno']    // options
        );
	?>

    <?= $form->field($model, 'role')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

  	
    <?php ActiveForm::end(); ?>

</div>
