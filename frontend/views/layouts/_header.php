
<?php
use common\models\Actions;
use common\models\Currency;
use yii\bootstrap\Html;

?>


<?php require_once "Mobile_Detect.php";
$detect = new Mobile_Detect;
 

// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
 echo "<html title=\"Lion-auto mobile\"><body>Mobile version</body></html>";
};

if( $detect->isMobile() ){
?>
    <html>
<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->



<header class="b-topBarMobile wow slideInDown" data-wow-delay="0.7s">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div style=transform:translateY(0px) class="b-topBar__logo wow slideInLeft" data-wow-delay="0.3s">
                    <a href="/"><img src="/images/logo/logo.png"></a>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-12 col-xs-12">
                <div class="b-topBar__addrMobile">
                    <span class="fa fa-map-marker"></span>
                    <?= $headerContent->address ?>
                </div>
            </div>
         </div>   
         <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="b-topBar__telMobile">
                    <a class = 'phones' href="/contact" title="Мы работаем с 9°° до 16°°" style="position: relative; top: -12px"><i class="fa fa-phone"></i><?= $contacts[0]->phone ?><br><i class="fa fa-phone"></i><?= $contacts[1]->phone ?><br><i class="fa fa-phone"></i><?= $contacts[2]->phone ?></a>
                </div>
            </div>
         </div>   
             <?php
            $euro= round(Currency::getCurrency('UAH'),3);
            $dollar= round(Currency::getCurrency('UAH')/Currency::getCurrency('USD'),3);
            $rur= round(Currency::getCurrency('UAH')/Currency::getCurrency('RUR'),3);
            ?>
         <div class="row">            
            <div class="col-md-12 col-xs-12">
                <div class="b-topBar__langMobile">
                    <div class="dropdown">
                        <input id="currency"  value="<?=  !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR' ?>" hidden>
                        <a data-toggle="tooltip" title="&nbsp;&nbsp;&nbsp;Евро : <?=$euro ?>&#10;Доллар : <?=$dollar ?>&#10;Рубль : <?=$rur ?>" href="#" class="dropdown-toggle" data-toggle='dropdown'>Валюта</a>

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
         <div class="row">
            <div class="col-md-12 col-xs-12">
                <nav class="b-topBar__navMobile">
                    <ul>

                        <?= Yii::$app->user->isGuest  ?  (
                                    '<li>'
                                    . Html::beginForm(['/login'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                        'Вход  <i class="fa fa-user"></i>',
                                        ['class' => 'user']
                                    )
                                    . Html::endForm()
                                    . '</li>                        <li><a href="/cart">Корзина</a></li>'
                                ) : (
                                    '<li style="padding-left:-10px; padding-right:-10px; margin-left:-10px; margin-right:-10px">'
                                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                        '<i class="fa fa-sign-out" aria-hidden="true"></i>  (' . Yii::$app->user->identity->email . ')',
                                        ['class' => 'user']
                                    )
                                    . Html::endForm()
                                    . '</li>                        <li style="padding-left:-10px; padding-right:-10px;margin-left:-10px; margin-right:-10px"><a href="/cart" title="Корзина"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li><li style="padding-left:-10px; padding-right:-10px;margin-left:-10px; margin-right:-10px"><a href="/cabinet" title="Личный кабинет"><i class="fa fa-street-view" aria-hidden="true"></i></a></li>'
                                ) ?>
                                    
                    </ul>
                </nav>
            </div>
         </div>
        
    </div>
</header><!--b-topBar-->

<nav class="b-navMobile">
    <div class="container">

        <div class="row">
            <div class="col-sm-9 col-xs-12">
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
                            <li><a href="/excel">Масла</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle='dropdown' href="#">Прайсы</a>

                            </li>
                            <li><a href="/about">Докуметы</a></li>
                            <li><a href="/contact">Запрос по VIN</a></li>
                            <li><a href="/contact">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="b-nav__logoMobile wow slideInLeft" data-wow-delay="0.3s">
                
                <?= Yii::$app->user->isGuest  ?  (
                                    '                    <h3><a href="/">LION-AUTO<span>.COM.UA</span></a></h3>
                    <p>
                        Автозапчасти
                    </p>
'
                                ) : (
                                    '<li style="padding-left:-10px; padding-right:-10px; margin-left:-10px; margin-right:-10px">Задолженность:</li>                        <li style="padding-left:-10px; padding-right:-10px;margin-left:-10px; margin-right:-10px"><a href="/"><i class="fa fa-history" style="font-size:36px;color:red"></i>Просроченная задолженность:</a></li>'
                                ) ?>
                                
                </div>
            </div>
        </div>    
    </div>
</nav><!--b-nav-->
</html>
<?php
} else{
?>
    <html>
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
                    <?= $headerContent->address ?>
                </div>
            </div>
            <div class="col-md-1 col-xs-6">
                <div class="b-topBar__tel">

                    <a class = 'phones' href="/contact" title="Мы работаем с 9°° до 16°°" style="position: relative; top: -12px"><i class="fa fa-phone"></i><?= $contacts[0]->phone ?><br><i class="fa fa-phone"></i><?= $contacts[1]->phone ?><br><i class="fa fa-phone"></i><?= $contacts[2]->phone ?></a>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
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
                                    . '</li>                        <li><a href="/cart">Корзина</a></li>'
                                ) : (
                                    '<li style="padding-left:-10px; padding-right:-10px; margin-left:-10px; margin-right:-10px">'
                                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                        '<i class="fa fa-sign-out" aria-hidden="true"></i>  (' . Yii::$app->user->identity->email . ')',
                                        ['class' => 'user']
                                    )
                                    . Html::endForm()
                                    . '</li>                        <li style="padding-left:-10px; padding-right:-10px;margin-left:-10px; margin-right:-10px"><a href="/cart" title="Корзина"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li><li style="padding-left:-10px; padding-right:-10px;margin-left:-10px; margin-right:-10px"><a href="/cabinet" title="Личный кабинет"><i class="fa fa-street-view" aria-hidden="true"></i></a></li>'
                                ) ?>
                       
                    </ul>
                </nav>
            </div>
            <?php
            $euro= round(Currency::getCurrency('UAH'),3);
            $dollar= round(Currency::getCurrency('UAH')/Currency::getCurrency('USD'),3);
            $rur= round(Currency::getCurrency('UAH')/Currency::getCurrency('RUR'),3);

            ?>
            <div class="col-md-2 col-xs-6">
                <div class="b-topBar__lang">
                    <div class="dropdown">
                        <input id="currency"  value="<?=  !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR' ?>" hidden>
                        <a data-toggle="tooltip" title="&nbsp;&nbsp;&nbsp;Евро : <?=$euro ?>&#10;Доллар : <?=$dollar ?>&#10;Рубль : <?=$rur ?>" href="#" class="dropdown-toggle" data-toggle='dropdown'>Валюта</a>

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
            <div class="col-md-4 col-xs-6">
                <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s">
                
                <?= Yii::$app->user->isGuest  ?  (
                                    '                    <h3><a href="/">LION-AUTO<span>.COM.UA</span></a></h3>
                   
'
                                ) : ( 
                                    '<li style="padding-left:-10px; padding-right:-10px; margin-left:-10px; margin-right:-10px; font-size:12px;">Задолженность: '. Yii::$app->user->identity->credit.' грн.</li>
                                     <li style="padding-left:-10px; padding-right:-10px;margin-left:-10px; margin-right:-10px"><a style="font-size:12px;color:red" href="/">Просроченная задолженность <i class="fa fa-history" style="font-size:24px;color:red"></i>:</a>'. Yii::$app->user->identity->overdue_credit.' грн.</li>'
                                ) ?>
                                
                </div>
            </div>
            <div class="col-sm-8 col-xs-8">
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
                            <li><a href="/excel">Масла</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle='dropdown' href="#">Прайсы</a>

                            </li>
                            <li><a href="/about">Докуметы</a></li>
                            <li><a href="/contact">Запрос по VIN</a></li>
                            <li><a href="/contact">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><!--b-nav-->
</html>
<?php
}

?>


 