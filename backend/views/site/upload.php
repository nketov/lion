<?php use yii\widgets\ActiveForm;

$this->title = 'Загрузка таблицы';?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'excelFile')->fileInput() ?>

    <button class="btn btn-primary">Загрузить данные из файла</button>

<?php ActiveForm::end() ?>