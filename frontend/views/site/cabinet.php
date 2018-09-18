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
                        <?php if(array_key_exists('*',$actions)) echo '<h4 style="color: #0D3349" class=" wow zoomInUp" data-wow-delay="0.7s">Скидка на все остальные товары: <span style="color:#1EBB30;font-size: 2rem ">'.$actions['*'].'%</span></h4>' ?>
                        <?php if (!array_key_exists('*', $actions)) echo '<p class="wow zoomInUp" class=" wow zoomInUp" data-wow-delay="0.7s">У вас нет скидки. Обратитесь к менеджеру сайта.</p>' ?>
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
                        <h3 style="text-align:left; font-size:14px; padding-top:12px;"
                            class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">
                            Специальные предложения</h3>

                        <div class=row>
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-hover table-responsive table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Товар</th>
                                        <th>Код</th>
                                        <th>Цена</th>
                                        <th>Скидка</th>
                                        <th>Цена со скидкой</th>
                                    </tr>
                                    </thead>
                                    <?php foreach ($actions as $key => $action) {

                                        $product = Excel::findOne(['code' => $key]);
                                        if (!empty($product)) {
                                            $price = round($product->price * $currency, 2);
                                            $price2 = round($product->getDiscountPrice() * $currency, 2);
                                            ?>
                                            <tr>
                                                <td style="padding:10px"><?= $product->name ?></td>
                                                <td style="padding:10px"><?= $key ?></td>
                                                <td style="padding:10px"><?= $price . ' ' . $currencySign ?></td>
                                                <td style="padding:10px"><?= $action . '  %' ?></td>
                                                <td style="padding:10px;color: #00a157;text-align: right"><b><?= $price2 . ' ' . $currencySign ?></b></td>
                                            </tr>
                                            <?php
                                        }
                                    } ?>
                                </table>
                            </div>
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
				

