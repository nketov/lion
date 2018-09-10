<?php use yii\widgets\ActiveForm;

$this->title = 'Загрузка изображений';?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'code')->textInput(['style'=>'width:250px']) ?>

<?= $form->field($model, 'image1')->fileInput() ?>

<?= $form->field($model, 'image2')->fileInput() ?>

    <button class="btn btn-primary">Загрузить изображения</button>

<?php ActiveForm::end() ?>