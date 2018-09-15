<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->user->email.' '.$model->date;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            ['attribute' => 'user_id',
                'headerOptions' => ['style' => 'min-width:80px, text-align:right'],
                'value' => function ($data) {
                    return $data->user->email;
                },
            ],
            'order_content:raw',
            'summ',         
               ['attribute' => 'status',
                   'headerOptions' => ['style' => 'min-width:80px, text-align:right'],
                   'value' => function ($data) {
                       return \common\models\Order::getStatuses()[$data->status]
                           ;
                   },
               ]
        ],
    ]) ?>

</div>
