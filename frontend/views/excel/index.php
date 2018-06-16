<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
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
                'value' => function ($data) {
                    return $data->price . '  €';
                },
                'filter' => false],
            //'currency:ntext',
            //
            ['attribute' => 'store',

                'filter' => \common\models\Excel::getAttrList('store')],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
    <br>
    <br>
    <br>
    <br>        
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>


