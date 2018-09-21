<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Содержание сайта'; ?>

<?php $form = ActiveForm::begin(); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Адрес и телефон</h3>
        </div>
        <div class="box-body">
            <?= $form->field($model, 'address')->textInput() ?>

            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+38 (999) 999 99 99',
            ]) ?>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Мета-теги</h3>
        </div>
        <div class="box-body">
            <?= $form->field($model, 'keywords')->textInput() ?>

            <?= $form->field($model, 'description')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary center-block']) ?>
    </div>

<?php ActiveForm::end(); ?>