<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExcelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

        <?php
        $form = ActiveForm::begin([
            'method' => 'get',
            'action' =>'/excel',
            'id' => 'search-form',
            'options' => ['class' => 'form-horizontal 	b-search__main', 
                'data-pjax' => 1
            ],
        ]) ?>
        <div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <div class="m-firstSelects">
                        <div class="col-xs-4">
                            <?= $form->field($searchModel, 'store')->dropDownList(array_merge(['' => 'На всех складах'],$searchModel::getAttrList('store')))->label(false)?>
                            <span class="fa fa-caret-down"></span>
                            <p>ВЫБЕРИТЕ СКЛАД</p>
                        </div>
                        <div class="col-xs-4">
                            <?= $form->field($searchModel, 'cars')->dropDownList(array_merge(['' => 'Любая модель'],$searchModel::getAttrList('cars')))->label(false)?>
                            <span class="fa fa-caret-down"></span>
                            <p>МОДЕЛЬ АВТО</p>
                        </div>
                        <div class="col-xs-4">
                            <?= $form->field($searchModel, 'code')->textInput()->input('code', ['placeholder' => "Название или код"])->label(false) ?>
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 text-left s-noPadding">

                    <div class="b-search__main-form-submit">
                        <button type="submit" class="btn m-btn">Поиск детали<span class="fa fa-angle-right"></span></button>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>




<!---->
<!--<div class="excel-search">-->
<!---->
<!--    --><?php //$form = ActiveForm::begin([
//        'action' => ['index'],
//        'method' => 'get',
//        'options' => [
//            'data-pjax' => 1
//        ],
//    ]); ?>
<!---->
<!--    --><?//= $form->field($model, 'id') ?>
<!---->
<!--    --><?//= $form->field($model, 'code') ?>
<!---->
<!--    --><?//= $form->field($model, 'name') ?>
<!---->
<!--    --><?//= $form->field($model, 'analogs') ?>
<!---->
<!--    --><?//= $form->field($model, 'cars') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'fabricator') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'quantity') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'price') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'currency') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'note') ?>
<!---->
<!--    --><?php //// echo $form->field($model, 'store') ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
<!--</div>-->
