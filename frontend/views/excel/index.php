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
                'headerOptions' => ['style' => 'min-width:80px, text-align:right'],
                'value' => function ($data) use ($currency, $currencySign) {
//                    return $data->price . '  '.$currency;
                    return round($data->price *$currency, 2). ' '.$currencySign;
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

<div id="cart-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <h5 class="modal-title">Выберите количество товара</h5>
            </div>
            <div class="modal-body" style="text-align: center">
                <button type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                <input type="number" min="1" max="5" value="1" readonly class="raz">
                <button type="button" onclick="this.previousElementSibling.stepUp()">+</button>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button id="modal-add" type="button" class="btn btn-primary">Добавить в корзину</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>


