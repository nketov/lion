<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;

?>

    <div class="container">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  
    <!--    <p>-->
    <!--        --><? //= Html::a('Create Excel', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>"{items}{summary}{pager}",
        'options' => ['style' => 'font: 12px FontAwesome'],
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
                    return StringHelper::truncate($data->analogs, 30);
                }],
            ['attribute' => 'cars',
                'value' => function ($data) {
                    return StringHelper::truncate($data->cars, 35);;
                },
                'filter' => \common\models\Excel::getAttrList('cars')],

            'fabricator:ntext',
            //'quantity',
            ['attribute' => 'price',
                'headerOptions' => ['style' => 'width:65px '],
                'value' => function ($data) {
                    return $data->price.'  €';
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
</div>
<br>
<br>
<br>
<br>
<br>

