<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>


<section>
    <div class="site-login">

        <br>
        <br><br><br><br><br><br><br>


    <section class="b-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                </div>
                <div class="col-lg-4 col-md-4">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Пожалуйста заполните следующие поля для регистрации:</p>
                    
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
                </div>
                <div class="col-lg-4 col-md-4">
                </div>
            </div>
        </div>
</div>
</div>
</section>