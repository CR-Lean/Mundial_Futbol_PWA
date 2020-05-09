<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jugador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPais')->textInput() ?>

    <?= $form->field($model, 'idClub')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Posicion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
