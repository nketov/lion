<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExcelSerch */
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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
            'code:ntext',
            'name:ntext',
//            'analogs:ntext',
            ['attribute' => 'cars',
                'value' => function ($data) {
                    return StringHelper::truncate($data->cars, 50);;
                },
                'filter' => \common\models\Excel::getAutoList()],

            'fabricator:ntext',
            //'quantity',
            //'price',
            //'currency:ntext',
            //'note:ntext',
            'store:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
