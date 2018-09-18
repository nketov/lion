<?php

use common\models\ExcelSearch;
use yii\helpers\Html;
use yii\helpers\Url;
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
    <div class="row">
        <div class="col-md-12">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'code:ntext',
                    'name:ntext',
                    [
                        'attribute' => 'analogs',
                        'contentOptions' => ['style' => 'word-wrap: break-word;
	                                                                            word-break: break-all;']
                    ],
                    'cars:ntext',
                    'fabricator:ntext',
                    'quantity',
                    [
                        'attribute' => 'price',
                        'contentOptions' => ['class' => 'bg-red'],
                        'value' => function ($data) use ($currency) {
                            return round($data->getDiscountPrice() * $currency, 2);
                        }
                    ],
                    [
                        'attribute' => 'currency',
                        'value' => $currencyName
                    ],
                    'store:ntext',
                ],

            ]) ?>

        </div>
        <?php
        $image1 = '';
        if (@get_headers(Url::to('/images/uploads/' . \str_replace('/','_____',$model->code . '_1'), true))[0] == 'HTTP/1.1 200 OK') $image1 = Url::to('/images/uploads/' . \str_replace('/','_____',$model->code . '_1'));
        $image2 = '';
        if (@get_headers(Url::to('/images/uploads/' . \str_replace('/','_____',$model->code . '_2'), true))[0] == 'HTTP/1.1 200 OK') $image2 = Url::to('/images/uploads/' .\str_replace('/','_____',$model->code . '_2'));
        ?>
        <div class="col-md-3">
            <?php if ($image1) { ?>
                <img src="<?= $image1 ?>" class="img-rounded img-thumbnail img-responsive">
            <?php } ?>
        </div>
        <div class="col-md-3">
            <?php if ($image2) { ?>
                <img src="<?= $image2 ?>" class="img-rounded img-thumbnail img-responsive">
            <?php } ?>
        </div>
    </div>
</div>