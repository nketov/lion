<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Actions */

$this->title = 'Создание акции';
$this->params['breadcrumbs'][] = ['label' => 'Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-create">
    <i>Символ <b>*</b> вместо кода товара означает скидку на все товары</i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
