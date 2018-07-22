<?php

use common\models\ExcelSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Excel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Excels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="b-search">
    <div class="container">

        <?php echo $this->render('_search', ['searchModel' => new ExcelSearch()]); ?>
    </div>
</section><!--b-search-->
<div class="container">
    <div class="col-lg-8">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'code:ntext',
            'name:ntext',
            'analogs:ntext',
            'cars:ntext',
            'fabricator:ntext',
            'quantity',
            [
                'attribute' => 'price',
                'value'  => function ($data) use ($currency){
                    return  round($data->price*$currency, 2) ;
                }                
            ],
            [
                'attribute' => 'currency',
                'value'  => $currencyName                
            ],         
            'store:ntext',
        ],
    ]) ?>

</div>
</div>