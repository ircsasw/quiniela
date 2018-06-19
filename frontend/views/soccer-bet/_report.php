<?php
	use yii\helpers\Html;
	use common\models\helpers\RecordHelpers;

	/* @var $this yii\web\View */

	$formatter = \Yii::$app->formatter;
?>

<?= "<h5>Folio de quiniela: ".$model->id."</h5>"; ?>
<?= "<h5>Usuario: <i>".$model->user->username."</i></h5>"; ?>
<?= "<i>Fecha: ".$model->date."</i>"; ?>

<?= "<br>Total hasta el momento, hoy día <i>" . date('d-m-Y H:i:00', time())."</i>: <br>".$model->total_points; ?>


<!--
	Diseño e iteración de los 48 partidos de la quiniela dentro del documento, averiguar la incrustación de imágenes.
-->
