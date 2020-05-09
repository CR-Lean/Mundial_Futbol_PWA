<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JugadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jugador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idJugador') ?>

    <?= $form->field($model, 'idPais') ?>

    <?= $form->field($model, 'idClub') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'Posicion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
