<?php
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
            <?php
                echo $form->field($model, 'score_a')->widget(TouchSpin::classname(), [
                     'options' => ['placeholder' => ''],
                ])->label(false); 
            ?>
           </div>
           <div class="col-sm-3" align="center">
            <?php echo "<b>".$model->teamNameA->name."</b>"; ?>   
           </div>
           <div class="col-sm-3" align="center">
                <?php echo "<b>".$model->teamNameB->name."</b>"; ?>   
           </div>
           <div class="col-sm-3">
                <?php
                    echo $form->field($model, 'score_b')->widget(TouchSpin::classname(), [
                         'options' => ['placeholder' => ''],
                    ])->label(false); 
                ?> 
            </div>
        <div class="col-sm-12">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?> 
        </div>
   </div>

    <?php ActiveForm::end(); ?>

</div>
