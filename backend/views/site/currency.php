<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Курсы валют'; ?>

<?php $form = ActiveForm::begin(); ?>
    <div class="box" style="width: 50%">
        <div class="box-body">

            <div class="row">

                <div class="col-md-4">
                    <?= $form->field($model, 'usd')->textInput(['style' => 'width:75px']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'uah')->textInput(['style' => 'width:75px']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'rur')->textInput(['style' => 'width:75px']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>