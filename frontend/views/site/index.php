<?php 
use yii\helpers\Url;
use yii\widgets\ActiveForm; ?>

<section class="b-search">
    <div class="container">
    <?php  echo $this->render(Url::toRoute(['excel/_search']), ['searchModel' => $searchModel]); ?>
    </div>
</section><!--b-search-->


<section class="b-slider">    
    <div id="carousel" class="slide carousel carousel-fade">
        <div class="carousel-inner">
            <div class="item active">
                <img src="/images/actions/action_1" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3>Акция</h3>
                        <h2><?= $contents[0]->header ?></h2>
                        <p><?= $contents[0]->text ?></p>
                        <a class="btn m-btn" href="/actions">смотреть<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="/images/actions/action_2" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3>Акция</h3>
                        <h2><?= $contents[1]->header ?></h2>
                        <p><?= $contents[1]->text ?></p>
                        <a class="btn m-btn" href="/actions">смотреть<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="/images/actions/action_3"  alt="sliderImg"/>
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3>Акция</h3>
                        <h2><?= $contents[2]->header ?></h2>
                        <p><?= $contents[2]->text ?></p>
                        <a class="btn m-btn" href="/actions">смотреть<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control right" href="#carousel" data-slide="next">
            <span class="fa fa-angle-right m-control-right"></span>
        </a>
        <a class="carousel-control left" href="#carousel" data-slide="prev">
            <span class="fa fa-angle-left m-control-left"></span>
        </a>
    </div>
</section><!--b-slider-->
