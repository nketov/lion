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
                        <p class="wow zoomInUp" data-wow-delay="0.7s">+380997729267 <a href="" title="Изменить"><i
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
                        <h3 style="text-align:left" class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">
                            Специальные предложения</h3>

                        <div class=row>
                            <div class="col-lg-1 col-md-1">
                            </div>
                            <div class="col-lg-10 col-md-10">
                                <table>
                                    <tr>
                                        <th>Товар</th>
                                        <th>Код</th>
                                        <th>Цена</th>
                                        <th>Скидка</th>
                                        <th>Цена со скидкой</th>
                                    </tr>
                        <?php foreach ($actions as $action) {
                                 $product= Excel::findOne(['code' => $action->code]);
                                if(!empty($product)) {
                                    $price=round($product->price *$currency, 2);
                                    $price2 = round($price *(100-$action->discount)/100, 2);
                                    ?>
                                    <tr>
                                        <td style="padding:10px"><?= $product->name ?></td>
                                        <td style="padding:10px"><?= $action->code ?></td>
                                        <td style="padding:10px"><?= $price. ' '.$currencySign   ?></td>
                                        <td style="padding:10px"><?= $action->discount . '  %' ?></td>
                                        <td style="padding:10px"><?= $price2. ' '.$currencySign ?></td>
                                    </tr>

                                    <?php
                                    }
                                } ?>
                                </table>
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
				

