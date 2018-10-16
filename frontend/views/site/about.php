<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список документов:';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br><br><br><br><br><br>
<section class="b-error">
    <div class="container">
<div class="site-about">
    <?php $path=Url::to('@frontend/web/documents/'); ?>
    <h1><?= Html::encode($this->title) ?></h1>
        <ul >
            <li><a href="/documents/price.xlsx" style="text-allign:left">1. Прайс товаров (EXEL)</a></li>
            <li><a href="/documents/1DOGOVOR_POSTAVKI_BLANK_KOZAK.doc" style="text-allign:left">2. Договор (WORD)</a></li>
            <li><a href="/documents/Akt_Reklamacii_LA.doc" style="text-allign:left">3. Акт рекламации (WORD)</a></li>
            <li><a href="/documents/Vozvratnaja_Nakladnaja_LA.docx" style="text-allign:left">4. Накладная возврата товара (EXEL)</a></li>
            <li><a href="/documents/Zajavlenie_na_reklamaciu_la.doc" style="text-allign:left">5. Заявление на рекламацию (WORD)</a></li>
            <li><a href="/documents/nariad_zakz_la.xlsx" style="text-allign:left">6. Бланк (наряд заказ для СТО) (WORD)</a></li>
        </ul>
    


</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</section>