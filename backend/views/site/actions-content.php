<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Содержание акций'; ?>

<?php foreach ($contents as $content) { ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Акция № <?= $content->id ?></h3>
        </div>
        <div class="box-body">

            <?= $form->field($content, 'id')->hiddenInput()->label(false) ?>

            <?= $form->field($content, 'header')->textInput() ?>

            <?= $form->field($content, 'text')->textInput() ?>

            <?= $form->field($content, 'content')->textarea(['rows' => '5']) ?>

            <?= $form->field($content, 'image')->fileInput() ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary center-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php } ?>