<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--    <p>-->
    <!--        --><? //= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'id',
                'headerOptions' => ['style' => 'min-width:35px, text-align:right'],
                'filter' => false],
//            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            //'status',
            [
                'attribute' => 'phone',
                'value' => function ($data) {
                    $string = $data->phone;
                    return '+38 (0' . $string[0] . $string[1] . ') ' . $string[2] . $string[3] . $string[4] . ' ' . $string[5] . $string[6] . ' ' . $string[7] . $string[8];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($data) {
                    return date(' d.m.Y H:i', $data->created_at);
                }
            ],


//            'updated_at',
            ['attribute' => 'credit',
                'headerOptions' => ['style' => 'min-width:80px, text-align:right'],
                'filter' => false],
            ['attribute' => 'overdue_credit',
                'headerOptions' => ['style' => 'min-width:80px, text-align:right, background:red'],
                'filter' => false],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} '
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
