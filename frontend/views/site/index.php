<?php use yii\helpers\Url;
use yii\widgets\ActiveForm; ?>
<br>
<br>
<br>
<br>
<br>
<section class="b-search">
    <div class="container">
        <?php
        $form = ActiveForm::begin([
            'method' => 'get',
            'action' =>'excel',
            'id' => 'search-form',

            'options' => ['class' => 'form-horizontal 	b-search__main'],
        ]) ?>
            <div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">

                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="m-firstSelects">
                            <div class="col-xs-4">
                                <?= $form->field($searchModel, 'store')->dropDownList(array_merge(['' => 'На всех складах'],$searchModel::getAttrList('store')))->label(false)?>
                                <span class="fa fa-caret-down"></span>
                                <p>ВЫБЕРИТЕ СКЛАД</p>
                            </div>
                            <div class="col-xs-4">
                                <?= $form->field($searchModel, 'cars')->dropDownList(array_merge(['' => 'Любая модель'],$searchModel::getAttrList('cars')))->label(false)?>
                                <span class="fa fa-caret-down"></span>
                                <p>МОДЕЛЬ АВТО</p>
                            </div>
                            <div class="col-xs-4">
                                <?= $form->field($searchModel, 'code')->textInput()->input('code', ['placeholder' => "Название или код"])->label(false) ?>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 text-left s-noPadding">

                        <div class="b-search__main-form-submit">
                            <a href=<?=Url::to('excel') ?>>Расширенный поиск</a>
                            <button type="submit" class="btn m-btn">Поиск детали<span class="fa fa-angle-right"></span></button>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>

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
