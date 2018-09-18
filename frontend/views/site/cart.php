<style>
    .b-topBar {
        position: fixed;
        margin-left: -80px;
        margin-top: -85px;
    }

    .b-nav {
        position: fixed;
        margin-left: -80px;
        margin-top: -20px;
    }

    * {
        box-sizing: border-box;
    }

    @media (min-width: 1200px) {
        .b-topBar {
            position: fixed;
            margin-left: -80px;
            margin-top: -65px;
        }
    }

    @media (min-width: 1600px) {
        .b-topBar {
            position: fixed;
            margin-left: -80px;
            margin-top: -85px;
        }
    }

    :root {
        --scroll: 0;
        --content: 0;
    }

    html,
    body {
        background: #fafafa;
        padding: 0;
        margin: 0;
        font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
        font-size: 16px;
    }

    html:after,
    body:after {
        content: '';
        height: 4px;
        background: rgba(142, 68, 173, 0.25);
        position: fixed;
        top: 0;
        left: 0;
        width: calc((var(--content)) * 1%);
    }

    h1 {
        color: #000000;
        font-size: calc((1.25 + (((1.25 * 1.25) - 1.25)) - ((((1.25 * 1.25) - 1.25)) * (var(--scroll) / 90))) * 1rem);
        top: 45vh;
    }

    h2 {
        color: #91ae08;
        font-size: calc((1 + (((1 * 1.1) - 1)) - ((((1 * 1.1) - 1)) * (var(--scroll) / 90))) * 1rem);
        top: calc(50vh + calc((1.25 + (((1.25 * 1.25) - 1.25)) - ((((1.25 * 1.25) - 1.25)) * (var(--scroll) / 90))) * 1rem));
    }

    body > p:nth-of-type(1) {
        color: #91ae08;
        font-size: calc((0.65 + (((0.65 * 1.1) - 0.65)) - ((((0.65 * 1.1) - 0.65)) * (var(--scroll) / 90))) * 1rem);
        padding-top: 10px;
        top: calc(50vh + calc((1.25 + (((1.25 * 1.25) - 1.25)) - ((((1.25 * 1.25) - 1.25)) * (var(--scroll) / 90))) * 1rem) + calc((1 + (((1 * 1.1) - 1)) - ((((1 * 1.1) - 1)) * (var(--scroll) / 90))) * 1rem));
    }

    @media (min-width: 768px) {
        h1 {
            font-size: calc((1.75 + (((1.75 * 2) - 1.75)) - ((((1.75 * 2) - 1.75)) * (var(--scroll) / 90))) * 1rem);
        }

        h2 {
            font-size: calc((1.2 + (((1.2 * 2) - 1.2)) - ((((1.2 * 2) - 1.2)) * (var(--scroll) / 90))) * 1rem);
            top: calc(51vh + calc((1.75 + (((1.75 * 2) - 1.75)) - ((((1.75 * 2) - 1.75)) * (var(--scroll) / 90))) * 1rem));
        }

        body > p:nth-of-type(1) {
            font-size: calc((0.65 + (((0.65 * 1.5) - 0.65)) - ((((0.65 * 1.5) - 0.65)) * (var(--scroll) / 90))) * 1rem);
            top: calc(50vh + calc((1.75 + (((1.75 * 2) - 1.75)) - ((((1.75 * 2) - 1.75)) * (var(--scroll) / 90))) * 1rem) + calc((1.2 + (((1.2 * 2) - 1.2)) - ((((1.2 * 2) - 1.2)) * (var(--scroll) / 90))) * 1rem));
        }
    }

    h1,
    h2,
    body > p:nth-of-type(1) {
        position: fixed;
        margin: 0;
        z-index: 5;
        left: 50%;
        width: 100vw;
        text-align: left;
        padding-left: 5vw;
        -webkit-transform: translate(0, calc((var(--scroll) / 90) * -45vh)) translate(-50%, -50%);
        transform: translate(0, calc((var(--scroll) / 90) * -45vh)) translate(-50%, -50%);
    }

    h2,
    body > p:nth-of-type(1) {
        left: 5vw;
        padding-left: 0;
        -webkit-transform-origin: left center;
        transform-origin: left center;
        opacity: calc(1 - ((var(--scroll) / 90) * 1));
        -webkit-transform: translate(0, calc((var(--scroll) / 90) * -45vh)) translate(0, -50%) scale(calc(1 - ((var(--scroll) / 90) * 1)));
        transform: translate(0, calc((var(--scroll) / 90) * -45vh)) translate(0, -50%) scale(calc(1 - ((var(--scroll) / 90) * 1)));
    }

    blockquote {
        position: relative;
        padding: 1.25rem 0 1.25rem 1.25rem;
        margin: 0;
    }

    blockquote:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 4px;
        background: #7ea01a;
    }

    blockquote p {
        padding: 0;
    }

    blockquote + p {
        padding-top: 0;
    }

    @media (min-width: 768px) {
        h1,
        h2,
        body > p:nth-of-type(1) {
            left: 50%;
            min-width: 45vw;
            width: calc((100 - var(--scroll)) * 1vw);
            text-align: center;

            padding-left: 0;
            opacity: 1;
            -webkit-transform: translate(calc(((var(--scroll) / 90) * -45vw)), calc(((var(--scroll) / 90) * 22.5vh) + ((var(--scroll) / 90) * calc((3 + (((3 * 1) - 3)) - ((((3 * 1) - 3)) * (var(--scroll) / 90))) * 1rem)))) translate(calc((((90 - var(--scroll)) / 90)) * -50%), -50%);
            transform: translate(calc(((var(--scroll) / 90) * -45vw)), calc(((var(--scroll) / 90) * 22.5vh) + ((var(--scroll) / 90) * calc((3 + (((3 * 1) - 3)) - ((((3 * 1) - 3)) * (var(--scroll) / 90))) * 1rem)))) translate(calc((((90 - var(--scroll)) / 90)) * -50%), -50%);
        }
    }

    body > p:nth-of-type(1):after {
        background: #c4e625;
        height: 30px;
        width: 30px;
        border-radius: 5px;
        position: fixed;
        top: 120%;
        left: 50%;
        opacity: calc(1 - ((var(--scroll) / 90) * 1));
        clip-path: polygon(25% 0%, 25% 60%, 0% 60%, 50% 100%, 100% 60%, 75% 60%, 75% 0%);
        -webkit-clip-path: polygon(25% 0%, 25% 60%, 0% 60%, 50% 100%, 100% 60%, 75% 60%, 75% 0%);
        -webkit-transform: translate(calc(-50% - 5vw), 0);
        transform: translate(calc(-50% - 5vw), 0);
    }

    @media (min-width: 768px) {
        body > p:nth-of-type(1):after {
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
    }

    .cart img {
        height: calc((100 - var(--scroll)) * 1vh);
        min-height: 10vh;
        -o-object-fit: cover;
        object-fit: cover;
        width: 100vw;
    }

    @media (min-width: 768px) {
        .cart img {
            border-radius: calc((var(--scroll) / 90) * 10px);
            min-height: 45vh;
            min-width: 45vw;
            width: calc((100 - var(--scroll)) * 1vw);
        }
    }

    p:nth-of-type(2) {
        left: 0;
        margin: 0;
        padding: 0;
        position: fixed;
        top: 0;
        z-index: 4;
    }

    @media (min-width: 768px) {
        p:nth-of-type(2) {
            min-height: 45vh;
            min-width: 45vw;
            -webkit-transform: translate(calc((var(--scroll) / 90) * 5vw), calc((var(--scroll) / 90) * 50vh)) translate(0, calc((var(--scroll) / 90) * -50%));
            transform: translate(calc((var(--scroll) / 90) * 5vw), calc((var(--scroll) / 90) * 50vh)) translate(0, calc((var(--scroll) / 90) * -50%));
            width: calc((100 - var(--scroll)) * 1vw);
        }
    }

    @media (min-width: 768px) {
        p:nth-of-type(2):before,
        p:nth-of-type(2):after {
            opacity: calc(1 - ((var(--scroll) / 90) * 1));
        }
    }

    p:nth-of-type(2):before {
        background: linear-gradient(0deg, #fff, rgba(250, 250, 250, 0.5));
        bottom: -2px;
        content: '';
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 2;
    }

    p:nth-of-type(2):after {
        background: linear-gradient(0deg, transparent, #fafafa);
        content: '';
        height: 10vh;
        left: 0;
        position: absolute;
        top: 100%;
        width: 100vw;
        z-index: 2;
    }

    @media (min-width: 768px) {
        p:nth-of-type(2):after {
            display: none;
        }
    }

    p:nth-of-type(3) {
        margin-top: 100vh;
    }

    @media (min-width: 768px) {
        p:nth-of-type(3) {
            margin-top: 120vh;
        }
    }

    body > p:last-of-type {
        margin-bottom: 20vh;
    }

    body {
        padding: 5vw;
    }

    @media (min-width: 768px) {
        body > p,
        body > strong,
        body > blockquote,
        body > h3,
        body > ul,
        body > ol {
            margin-left: 50vw;
            margin-right: 0vw;
        }
    }

    h3 {
        color: #7ea01a;
        font-weight: bolder;
        margin-top: 3rem;
        font-size: 1.3rem;
    }

    ul ol {
        margin-left: 15px;
    }

    ul,
    ol {
        padding-left: 18px;
    }

    ul li,
    ol li {
        margin: 0;
        padding: 0 0 14px 15px;
    }

    ol {
        margin-top: 15px;
    }

    p {
        line-height: 1.5rem;
        padding-top: 2rem;
    }

    ul + p,
    h3 + p {
        padding-top: 0;
    }
</style>
<script>
    var ROOT = document.documentElement;
    var MIN = 10;
    var THRESHOLD = innerHeight * (1.2 - 0.225);
    var update = function update(e) {
        var scroll = Math.floor(scrollY / innerHeight * 100);
        if (scrollY > THRESHOLD) {
            var progress = Math.floor((scrollY - THRESHOLD) / (document.body.scrollHeight - innerHeight - THRESHOLD) * 100);
            ROOT.style.setProperty('--content', progress);
        }
        ROOT.style.setProperty('--scroll', Math.max(0, Math.min(scroll, 100 - MIN)));
    };
    window.addEventListener('scroll', update);
</script>
<br><br><br><br><br><br><br><br><br><br><br><br>
<h1>Всего позиций: <?= $cart->getQuantity() ?>
    <br>Общая сумма: <?= round($cart->summ * $currency, 2) . ' ' . $currencySign ?>
    <br><a href="/excel/order">Заказать</a>&nbsp;&nbsp;
    <a href="/excel/reset-cart">Очистить</a></h1>
<p><strong><em>от <?= date("d.m.Y"); ?></em> <?= Yii::$app->user->isGuest ?  yii\helpers\Html::a('войдите ', ['/login']).' чтобы заказать' : 'Заказчик:'.Yii::$app->user->identity->email  ?></strong></p>
<h2>Крутите вниз чтобы просмотреть полностью</h2>

<p><br><br><br><br><br><br><br><br><br><img class="cart" src="/images/backgrounds/cart.png" alt="cherry blossoms"></p>
<?php

$rows = $cart->getQuantity(); // количество строк, tr

echo '<p>';
$tr = 1;
foreach ($cart->getProducts() as $key => $val) { // в этом цикле счётчик $tr
    $model = \common\models\Excel::findOne($key);
    if ($model) {
        echo '<tr>';
        echo '<td><p><b>
            ' . $tr . '. </b></td><td> ' .
            $model->code . '&nbsp&nbsp&nbsp&nbsp</td><td><b style="color: #008"> ' .
            $model->name . '&nbsp&nbsp&nbsp&nbsp</b></td><td> ' .
            $model->fabricator . '&nbsp&nbsp&nbsp&nbsp </td><td><b style="color: #A00"> '
            . $val['qty'] . '&nbspшт.&nbsp&nbsp&nbsp</b> </td><td><b style="color: #090"> ' .
            round($model->getDiscountPrice() * $currency * $val['qty'], 2) . ' ' . $currencySign . ' </b></td><td> 
            <button  type="button" class="btn btn-primary btn-sm cart-view" data-id="'.$model->id.'" title="Просмотр"><i class="fa fa-eye"></i></button> 
            <button type="button" class="btn btn-danger btn-sm cart-delete" data-id="'.$model->id.'" title="Удалить из корзины"><i class="fa fa-window-close cart-delete"></i></button> 
              </p></td>';
        echo '</tr>';
        $tr++;
    }
}

echo '</p>';

?>

<blockquote>
    <p>Проверяйте количество деталей и номер телефона, указанный в личном кабинете</p>
</blockquote>
<h3>Акционная цена добавляется автоматически</h3>
<p>Красным подсвечивается товар, которого в данный момент нет в наличии</p>
<h3>Основной заказ:</h3>
<p>Способ доставки</p>
<ul>
    <li><b>Самовывоз</li>
    <li>Доставка</li>
    <li>Новая почта</li>
    <li>Другой</b></li>
</ul>






			    
