<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\alert\AlertBlock;
use kartik\growl\Growl;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <?= $this->render('_head.php') ?>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
<?php $this->beginBody() ?>
<?= $this->render('_header.php') ?>

<?php
foreach (Yii::$app->session->getAllFlashes() as $message) {

    $message = '<h3 style="text-align: center">'.$message.'</h3>';
    echo Growl::widget(['type' => Growl::TYPE_INFO,
        'icon' => 'glyphicon glyphicon-envelope',
        'body' => $message,
        'showSeparator' => true,
        'pluginOptions' => ['placement' => ['from' => 'top','align' => 'right']]]);
}
?>

<?= $content ?>


</div>
</div>
<?= $this->render('_footer.php') ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
