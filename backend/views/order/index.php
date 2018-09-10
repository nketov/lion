<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        --><?//= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
/*
            ['attribute' => 'status',
                'format' => 'raw',
                'headerOptions' => ['style' => 'min-width:80px, text-align:right'],
                'value' => function ($data) {
                    return  Html::dropDownList('status', $data->status, \common\models\Order::getStatuses());

//                    return $data->user->email;
                },
            ],
*/

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php
$script = <<< JS
$('select[name="status"]').on('change',
    function() {
       var status =$(this).val();
       var order = $(this).closest('tr').data('key');
        $.ajax({
            method: "POST",
            url: '/admin/order/status',
            data: {status:status,order:order} 
          })
          .done(function( data ) {
           console.log('Status Changed');   
          });      
    }
);
JS;
$this->registerJs($script, yii\web\View::POS_READY);
 ?>