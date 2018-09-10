<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Actions */

$this->title = 'Редактирование акции № ' . $model->id;

?>
<div class="actions-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
