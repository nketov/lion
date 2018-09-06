<br><br><br>
<? use common\models\Excel;

if (!Yii::$app->user->isGuest) { ?>
    <section class="b-error">
        <div class="container">
            <br><br>
            <div class="cabinet">
                <br> <br>
                <br> <br>
                <div class=row>

                    <div id="history" class="col-md-3">
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">История заказов</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s">Задолженность: 0 грн</p>
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Персональные предложения</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s">У вас нет персонального предложеения</p>
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Ваш номер телефона</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s">+380(__) ___-__-__ <a href="" title="Изменить"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a></p>
                        <h3 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Оставить комментарий</h3>
                        <p class="wow zoomInUp" data-wow-delay="0.7s"><a href="" title="Оставить отзыв на fb"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=""
                                                                                                                 title="Оставить отзыв на G+"><i
                                    class="fa fa-google-plus" aria-hidden="true"></i></a></p>

                    </div>
                    <div id="history" class="col-md-1">
                    </div>
                    <div style="text-align:left" class="col-md-7">
                        <h3 style="text-align:left; font-size:14px; padding-top:12px;" class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">
                            Специальные предложения</h3>

                        <div class=row>
                            <div class="col-lg-1 col-md-1">
                            </div>
                            <div class="col-lg-10 col-md-10">
                                <table>
                                    <tr>
                                        <th style="padding:10px">Товар</th>
                                        <th style="padding:10px">Код</th>
                                        <th style="padding:10px">Цена</th>
                                        <th style="padding:10px">Скидка</th>
                                        <th style="padding:10px">Цена со скидкой</th>
                                    </tr>
                        <?php		foreach ($actions as $key=>$action) {

                            $product= Excel::findOne(['code' => $key]);
                            if(!empty($product)) {
                                $price = round($product->price * $currency, 2);
                                $price2 = round($product->getDiscountPrice() * $currency, 2);
                                ?>
                                <tr>
                                    <td style="padding:10px"><?= $product->name ?></td>
                                    <td style="padding:10px"><?= $key ?></td>
                                    <td style="padding:10px"><?= $price . ' ' . $currencySign ?></td>
                                    <td style="padding:10px"><?= $action . '  %' ?></td>
                                    <td style="padding:10px"><?= $price2 . ' ' . $currencySign ?></td>
                                </tr>
                                    <?php
                                    }
                                } ?>
                                </table>
                                <?php if(array_key_exists('*',$actions)) echo '<p>Скидка на все остальные товары: '.$actions['*'].' %</p>' ?>
                                </div>
                                <div class="col-lg-1 col-md-1">
                                </div>

                            </div>
                        <!--			    		        <p class="wow zoomInUp" data-wow-delay="0.7s">В данный момент страница с информацией находится в разработке</p>-->
                    </div>
                </div>
            </div>
            <h3 class="s-title wow zoomInUp" data-wow-delay="0.7s">Мой кабинет</h3>
        </div>
    </section>
<?php } ?>
				

