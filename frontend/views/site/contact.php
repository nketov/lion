<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br><br><br><br><br><br>
<div class="site-contact">
    <h1 style="padding-left:20px;"><?= Html::encode($this->title) ?></h1>

    <h4>
        <center>Если у вас есть деловые вопросы или другие вопросы, пожалуйста, заполните следующую форму, чтобы
            связаться с нами. Спасибо.
        </center>
    </h4>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['enableClientValidation' => true, 'id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+38 (099) 999 99 99',
                'clientOptions' => [
                    'removeMaskOnSubmit' => true,
                ]
            ])->textInput();
            ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-6">
            <p> Контакты:</p>

            <?php foreach ($contacts as $contact) {
                if (!($contact->phone)) continue;
                ?>
                <p><img src="/images/icons/<?= $contact->icon ?>" alt=""> <?= $contact->phone ?> - <?= $contact->text ?>
                </p>

            <?php } ?>

            <p><img src="/images/icons/email.png" alt=""> Lionauto.in.ua@gmail.com</p>
            <p><img src="/images/icons/icq.png" alt=""> <?= common\models\Content::findOne(1)->icq ?></p>
            <br>
            <p>График работы:</p>
            <p>Пн: 9:00- 16:00</p>
            <p>Вт: 9:00- 16:00</p>
            <p>Ср: 9:00- 16:00
            <p>
            <p>Чт: 9:00- 16:00</p>
            <p>Пн: 9:00- 16:00</p>
            <p>Сб: 9:00- 14:00</p>
            <p>Вс: НЕ РАБОЧИЙ ДЕНЬ</p>
        </div>
    </div>


</div>
<br><br><br><br><br><br><br>
