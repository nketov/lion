<?php

/* @var $this yii\web\View */

use common\models\Excel;

?>
<br><br><br><br>
<section class="b-actions">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <? if (!Yii::$app->user->isGuest) { ?>
        <br>
        <div>
            <h1 class="wow zoomInUp" data-wow-delay="0.7s">Только для Вас:</h1>
            <img style="height: 325px; background-color: rgba(255,0,0,0.1);"
                 class="img-responsive center-block wow zoomInUp" data-wow-delay="0.7s"
                 src="/images/backgrounds/prize.jpg" alt="404"/>
            <h2 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Специальное предложение</h2>
            <div class=row>
                <div class="col-lg-1 col-md-1">
                </div>
                <div class="col-lg-10 col-md-10">
                    <table class="table table-hover table-responsive table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Товар</th>
                            <th>Код</th>
                            <th>Цена</th>
                            <th>Скидка</th>
                            <th style="padding:10px;color: #00a157;text-align: right" >Цена со скидкой</th>
                            <th></th>
                        </tr>
                        </thead>

                        <?php
                        foreach ($actions as $key => $action) {

                            $product = Excel::findOne(['code' => $key]);
                            if (!empty($product)) {
                                $price = round($product->price * $currency, 2);
                                $price2 = round($product->getDiscountPrice() * $currency, 2);
                                ?>
                                <tr>
                                    <td style="padding:10px"><?= $product->name ?></td>
                                    <td style="padding:10px"><?= $key ?></td>
                                    <td style="padding:10px"><?= $price . '&nbsp' . $currencySign ?></td>
                                    <td style="padding:10px"><?= $action . '&nbsp%' ?></td>
                                    <td style="padding:10px;color: #00a157;text-align: right">
                                        <b><?= $price2 . '&nbsp' . $currencySign ?></b></td>
                                    <td style="padding:10px"><button  type="button" class="btn btn-primary btn-sm cart-view" data-id="<?= $product->id?>" title="Просмотр"><i class="fa fa-eye"></i></button></td>
                                </tr>

                                <?php
                            }
                        } ?>
                    </table>
                    <?php if (array_key_exists('*', $actions)) echo '<h4 style="color: #0D3349">Скидка на все остальные товары: <span style="color:#1EBB30;font-size: 3rem ">' . $actions['*'] . '%</span></h4>' ?>
                </div>
                <div class="col-lg-1 col-md-1">
                </div>

            </div>
        </div>
        <p class="wow zoomInUp" data-wow-delay="0.7s">Вы получили это специальное предложение, как зарегистрированный
            пользователь </p>
        <h3 class="s-title wow zoomInUp" data-wow-delay="0.7s">Удачных покупок!</h3></div>
    <?php } else { ?>
        <div>
            <h3>Регистрируйтесь <a href="/login"><i class="fa fa-user-plus" aria-hidden="true"></i></a> для того, чтобы
                получить персональное предложение!</h3>
            <p></p>
        </div>
    <?php } ?>


    </div>
</section>
