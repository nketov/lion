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
                <img src="/media/main-slider/1.jpg" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3>Найти деталь</h3>
                        <h2>Большой выбор</h2>
                        <p>В наличии <span>184 900 наименований</span></p>
                        <a class="btn m-btn" href="detail.html">смотреть<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="/media/main-slider/2.jpg" alt="sliderImg" />
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3>Поиск среди аналогов</h3>
                        <h2>Большая база</h2>
                        <p>2018 <span>обновлено </span></p>
                        <a class="btn m-btn" href="detail.html">смотреть<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="/media/main-slider/3.jpg"  alt="sliderImg"/>
                <div class="container">
                    <div class="carousel-caption b-slider__info">
                        <h3>Выгодно</h3>
                        <h2>Поиск по всем базам</h2>
                        <p>сотрудничаем <span>с 97 поставщтками</span></p>
                        <a class="btn m-btn" href="detail.html">смотреть<span class="fa fa-angle-right"></span></a>
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
