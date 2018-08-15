<?php
use yii\bootstrap\Html;

$content = common\models\Content::findOne(1);
?>
<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->
<!-- Start Switcher -->
<div class="switcher-wrapper">
    <div class="demo_changer">
        <div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
        <div class="form_holder">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="predefined_styles">
                        <div class="skin-theme-switcher">
                            <h4>Color</h4>
                            <a href="#" data-switchcolor="color1" class="styleswitch"
                               style="background-color:#869498;"> </a>
                            <a href="#" data-switchcolor="color2" class="styleswitch"
                               style="background-color:#f76d2b;"> </a>
                            <a href="#" data-switchcolor="color3" class="styleswitch"
                               style="background-color:#228dcb;"> </a>
                            <a href="#" data-switchcolor="color4" class="styleswitch"
                               style="background-color:#00bff3;"> </a>
                            <a href="#" data-switchcolor="color5" class="styleswitch"
                               style="background-color:#2dcc70;"> </a>
                            <a href="#" data-switchcolor="color6" class="styleswitch"
                               style="background-color:#6054c2;"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Switcher -->

<header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-4">
                <div style=transform:translateY(0px) class="b-topBar__logo wow slideInLeft" data-wow-delay="0.3s">
                    <a href="/"><img src="/images/logo/logo.png"></a>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="b-topBar__addr">
                    <span class="fa fa-map-marker"></span>
                    <?= $content->address ?>
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="b-topBar__tel">
                    <span class="fa fa-phone"></span>
                    <a class = 'phones' href="/contact" title="Мы работаем с 9°° до 16°°"><?= $content->phone ?></a>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <nav class="b-topBar__nav">
                    <ul>

                        <?= Yii::$app->user->isGuest  ?  (
                                    '<li>'
                                    . Html::beginForm(['/login'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                        'Вход  <i class="fa fa-user"></i>',
                                        ['class' => 'user']
                                    )
                                    . Html::endForm()
                                    . '</li>                        <li><a href="cart">Корзина</a></li>'
                                ) : (
                                    '<li>'
                                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                        '<i class="fa fa-sign-out" aria-hidden="true"></i>  (' . Yii::$app->user->identity->email . ')',
                                        ['class' => 'user']
                                    )
                                    . Html::endForm()
                                    . '</li>                        <li><a href="cart" title="Корзина"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li><li><a href="/cabinet" title="Личный кабинет"><i class="fa fa-street-view" aria-hidden="true"></i></a></li>'
                                ) ?>
                       
                    </ul>
                </nav>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="b-topBar__lang">
                    <div class="dropdown">
                        <input id="currency"  value="<?=  !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR' ?>" hidden>
                        <a href="#" class="dropdown-toggle" data-toggle='dropdown'>Валюта</a>
                        <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span id="currency-flag"
                                class="b-topBar__lang-flag m-en"></span><span class="fa fa-caret-down"></span></a>
                        <ul class="dropdown-menu h-lang">
                            <li><a id="EUR" class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span
                                        class="b-topBar__lang-flag m-en"></span></a></li>
                            <li><a id="USD" class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span
                                        class="b-topBar__lang-flag m-es"></span></a></li>
                            <li><a id="UAH" class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span
                                        class="b-topBar__lang-flag m-de"></span></a></li>                           
                            <li><a id="RUR" class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span
                                        class="b-topBar__lang-flag m-ru"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!--b-topBar-->

<nav class="b-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                    <h3><a href="/">LION-AUTO<span>.COM.UA</span></a></h3>
                    <p>
                        Автозапчасти
                    </p>
                </div>
            </div>
            <div class="col-sm-9 col-xs-8">
                <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                        <ul class="navbar-nav-menu">

                            <li>
                                <a  href="/actions">Акции</a>
                            </li>
                            <li><a href="/compare.html">Масла</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle='dropdown' href="#">Прайсы</a>

                            </li>
                            <li><a href="/about">Докуметы</a></li>
                            <li><a href="/submit1.html">Запрос по VIN</a></li>
                            <li><a href="/contact">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><!--b-nav-->
