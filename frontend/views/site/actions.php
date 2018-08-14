<?php

/* @var $this yii\web\View */

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
				<p class="wow zoomInUp" data-wow-delay="0.7s">Вы получили это специальное предложение, как зарегистрированный пользователь </p>
				<h3 class="s-title wow zoomInUp" data-wow-delay="0.7s">Удачных покупок!</h3></div>
				<?php }?>
				<div>
				    <h3>Регистрируйтесь <a  href="/login"><i class="fa fa-user-plus" aria-hidden="true"></i></a> для того, чтобы получить персональное предложение!</h3>
				    <p></p>
				</div>
				
				
			</div>
		</section><!--b-error-->
