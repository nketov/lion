<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<?php Pjax::begin(); ?>
<section class="b-search">
    <div class="container">

        <?php echo $this->render('_search', ['searchModel' => $searchModel]); ?>
    </div>
</section><!--b-search-->
<div class="container">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
//        'filterModel' => $searchModel,
        'layout' => "{items}{summary}{pager}",
        'options' => ['style' => 'font: bold 14px Tahoma'],
        'rowOptions' => function ($model, $key, $index, $grid) {
            $class = $index % 2 ? 'odd' : 'even';  // стилизация четной и нечетной строки
            if ($model->quantity == 0) $class = 'zero';
            return array('key' => $key, 'index' => $index, 'class' => $class);
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
            'code:ntext',
            ['attribute' => 'name',
                'value' => function ($data) {
                    return StringHelper::truncate($data->name, 45);
                }],

            ['attribute' => 'analogs',
                'value' => function ($data) {
                    return StringHelper::truncate($data->analogs, 15);
                }],
            ['attribute' => 'cars',
                'value' => function ($data) {
                    return StringHelper::truncate($data->cars, 30);;
                },
                'filter' => \common\models\Excel::getAttrList('cars')],

            'fabricator:ntext',
            'quantity',
            ['attribute' => 'price',
                'headerOptions' => ['style' => 'min-width:100px, text-align:right'],
                'format'=>'raw',
                'value' => function ($data) use ($currency, $currencySign) {
//                    return $data->price . '  '.$currency;
                    return round($data->getDiscountPrice() *$currency, 2). '&nbsp'.$currencySign;
                },
                'filter' => false],
            //'currency:ntext',
            //
            ['attribute' => 'store',

                'filter' => \common\models\Excel::getAttrList('store')],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {cart}',
                'buttons' => [
                    'cart' => function($url, $model, $index) {
                        return $model->quantity? Html::a(
                            '<span class="add-cart fa fa-cart-arrow-down" data-id='.$index.' data-qty='.$model->quantity.'>',
                            Url::to(['excel/add-cart'])
                        ): "";
                    }
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?> 
</div>




