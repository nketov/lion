<?php  
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Lion Auto';


$form = ActiveForm::begin([
    'method' => 'get',
    'action' =>'excel',
    'id' => 'search-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($searchModel, 'code') ?>
<?= $form->field($searchModel, 'cars')->dropDownList(array_merge(['' => ''],$searchModel::getAttrList('cars')))?>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
