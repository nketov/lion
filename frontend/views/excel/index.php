<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExcelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lion Auto';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="excel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  
    <!--    <p>-->
    <!--        --><? //= Html::a('Create Excel', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'font:bold 12px Arial'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
            'code:ntext',
            ['attribute' => 'name',
                'value' => function ($data) {
                    return StringHelper::truncate($data->name, 35);
                }],

            ['attribute' => 'analogs',
                'value' => function ($data) {
                    return StringHelper::truncate($data->analogs, 35);
                }],
            ['attribute' => 'cars',
                'value' => function ($data) {
                    return StringHelper::truncate($data->cars, 35);;
                },
                'filter' => \common\models\Excel::getAttrList('cars')],

            'fabricator:ntext',
            //'quantity',
            'price',
            //'currency:ntext',
            //'note:ntext',
            ['attribute' => 'store',

                'filter' => \common\models\Excel::getAttrList('store')],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
