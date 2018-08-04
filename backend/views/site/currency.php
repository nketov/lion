<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Курсы валют';?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'usd')->textInput(['style'=>'width:75px']) ?>

<?= $form->field($model, 'uah')->textInput(['style'=>'width:75px']) ?>

<?= $form->field($model, 'rur')->textInput(['style'=>'width:75px']) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>