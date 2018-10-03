<?php
   require("_social.php");
?>
<div id="cart-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <h5 class="modal-title">Выберите количество товара</h5>
            </div>
            <div class="modal-body" style="text-align: center">
                <button type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                <input type="number" min="1" max="5" value="1" readonly class="raz">
                <button type="button" onclick="this.previousElementSibling.stepUp()">+</button>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button id="modal-add" type="button" class="btn btn-primary">Добавить в корзину</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>

<footer class="b-footer">
    <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
    <div class="container">
        <div class="row">
        
            <div class="col-xs-4">
                <div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="b-nav__logo">
                        <h3><a href="index.html">Lion-Auto<span>.com.ua</span></a></h3>
                    </div>
                    <p>&copy; 2018 Designed by Saggitarius &amp; Powered by Ukrdeveloper.pro</p>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                    <div class="b-footer__content-social">
                        <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=700,height=400');" href="javascript: void(0)">
    <span class="fa fa-facebook-square" ></span></a>
                        
                        
                        <a href="https://plus.google.com/share?url=http://lion-auto.com.ua"><span class="fa fa-google-plus-square"></span></a>
                        <a href="#"><span class="fa fa-skype"></span></a>
                    </div>
                    <nav class="b-footer__content-nav">
                        <ul>
                        
                            <li><a href="/actions">Акции</a></li>
                            <li><a href="/login">Войти</a></li>
                            <li><a href="/excel">Поиск</a></li>
                            <li><a href="/cart">Корзина</a></li>
                            <li><a data-toggle="tooltip" title="&nbsp;&nbsp;&nbsp;Евро : <?=$euro ?>&#10;Доллар : <?=$dollar ?>&#10;Рубль : <?=$rur ?>" href="#" class="dropdown-toggle" data-toggle='dropdown'>Курсы валют</a></li>
                            <li><a href="/about">Документы</a></li>
                            <li><a href="/contact">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<!--    --><?//= phpinfo() ?>
</footer><!--b-footer-->
<!--Main-->
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/modernizr.custom.js"></script>

<script src="/libs/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/jquery.easypiechart.min.js"></script>
<script src="/js/classie.js"></script>

<!--Switcher-->
<script src="/libs/switcher/js/switcher.js"></script>
<!--Owl Carousel-->
<script src="/libs/owl-carousel/owl.carousel.min.js"></script>
<!--bxSlider-->
<script src="/libs/bxslider/jquery.bxslider.js"></script>
<!-- jQuery UI Slider -->
<script src="/libs/slider/jquery.ui-slider.js"></script>

<!--Theme-->
<script src="/js/jquery.smooth-scroll.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/jquery.placeholder.min.js"></script>
<script src="/js/theme.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script src="http://swip.codylindley.com/jquery.popupWindow.js"></script>

<script type="text/javascript">
    $('#share').popupWindow({
        width:550,
        height:400,
        centerBrowser:1
    });
</script>