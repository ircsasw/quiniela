<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container-fluid bg-grey">
  <h2><?= Html::encode($this->title) ?></h2>
  <div class="row">
    <div class="col-sm-5">
      <h3 style="font-family: verdana;">¡Hagamos grandes cosas juntos!</h3>
      <h3><span class="glyphicon glyphicon-envelope"></span> info@ircsasoftware.com.mx</h3>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Ingrese su nombre']) ?>
        </div>
        <div class="col-sm-6 form-group">
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Ingrese su correo electrónico']) ?>
         </div>
         <div class=" col-sm-12 form-group">
                <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Ingrese el asunto']) ?>
         </div>
      </div>
         <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => 'Cuerpo del mensaje']) ?>
         <div class="col-lg-8">
             <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
         </div>
      <div class="row">
            <div class="col-sm-12 form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        <?php ActiveForm::end(); ?>
            </div>
      </div>
    </div>
  </div>
</div>
