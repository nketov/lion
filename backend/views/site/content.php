<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Содержание сайта'; ?>

<?php foreach ($contacts as $contact) { ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Контакт №<?= $contact->id ?></h3>
        </div>
        <div class="box-body">

            <?= $form->field($contact, 'id')->hiddenInput()->label(false) ?>

            <?= $form->field($contact, 'phone')->textInput() ?>

            <?= $form->field($contact, 'text')->textInput() ?>

            <?= $form->field($contact, 'icon')->dropDownList([
                'voodafone.png' => 'Voodafone',
                'kyivstar.png' => 'KyivStar',
                'life.png' => 'Life'

            ]); ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary center-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php } ?>


<?php $form = ActiveForm::begin(); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Адрес и icq</h3>
        </div>
        <div class="box-body">
            <?= $form->field($model, 'address')->textInput() ?>

            <?= $form->field($model, 'icq')->textInput() ?>
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