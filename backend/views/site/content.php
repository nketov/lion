<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Содержание сайта';?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'address')->textInput() ?>

<?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '+38 (999) 999 99 99',
]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>