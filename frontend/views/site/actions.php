<?php

/* @var $this yii\web\View */

use common\models\Excel;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
        <br><br><br><br>
		<section class="b-actions">
			<div class="container">
				<br>
				<br>
				<br>				
				<br>
				
				<? if( !Yii::$app->user->isGuest) {?>
				<br>
				<div>
				<h1 class="wow zoomInUp" data-wow-delay="0.7s">Только для Вас:</h1>
				<img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.7s" src="/images/backgrounds/cart.png" alt="404" />
				<h2 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Специальное предложение</h2>
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
								
								<?php
								foreach ($actions as $key=>$action) {

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
				<p class="wow zoomInUp" data-wow-delay="0.7s">Вы получили это специальное предложение, как зарегистрированный пользователь </p>
				<h3 class="s-title wow zoomInUp" data-wow-delay="0.7s">Удачных покупок!</h3></div>
				<?php } else {?>
				<div>
				    <h3>Регистрируйтесь <a  href="/login"><i class="fa fa-user-plus" aria-hidden="true"></i></a> для того, чтобы получить персональное предложение!</h3>
				    <p></p>
				</div>
				<?php }?>
				
				
			</div>
		</section><!--b-error-->
