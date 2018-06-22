<?php
	use yii\helpers\Html;
	use common\models\helpers\RecordHelpers;

	/* @var $this yii\web\View */

	$formatter = \Yii::$app->formatter;
?>
<!--<div align="center" class="jumbotron">
	<hr class="my-4">
		<h1 align="center">Resultados de la quiniela</h1>
	<hr class="my-4">
</div> -->


<!--
	Diseño e iteración de los 48 partidos de la quiniela dentro del documento, averiguar la incrustación de imágenes.
-->
<div align="center">
	<table style="width:100%">
	  <tr>
	  	<th>#</th>
	    <th>Marcador A: </th>
	    <th>Equipo A: </th>
	    <th>Marcador B: </th>
	    <th>Equipo B: </th>
	    <th>Puntaje: </th>
	  </tr>
		 <?php foreach ($mySBets as $mySbet) { ?>
		  <tr>
		  		<td><?= $mySbet->match_id?></td>
		    	<td><?= $mySbet->score_a ?></td>;
		    	<td><?= $mySbet->match->teamNameA->name; ?></td>;
		    	<td><?= $mySbet->score_b ?></td>;
		    	<td><?= $mySbet->match->teamNameB->name; ?></td>;
		    	<td><?= $mySbet->points ?></td>;
		  </tr>
		  <?php   } ?>
	</table>
</div>