<?php

use settings\readModels\library\LibraryZiyonetReadRepository;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $model LibraryZiyonetReadRepository */
?>

<div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

    <div class="single-blog2">

        <div class="blog2-image">
            <?= Html::img($model['cover'], ['alt' => '#'])?>
            <div class="post-date">
                <?= date('d-M', strtotime($model['created_at']))?> <span><?= date('Y', strtotime($model['created_at']))?></span>
            </div>
        </div>

        <div class="blog2-content">
            <h3><a href="blog-details.html"><?=substr($model['title'], 0, 80) . '...'?></a></h3>
            <ul class="blog2-meta">
                <li><i class="far fa-signal"></i> Daraja:</li>
                <li><a href="#"><?=$model['level'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-reply"></i> Tur:</li>
                <li><a href="#"><?=$model['type'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-user"></i> Muallif:</li>
                <li><a href="#"><?=$model['author'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-calendar"></i> Nashir etilgan yili:</li>
                <li><a href="#"><?=$model['published_at'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-sort-numeric-up"></i> UDK raqami:</li>
                <li><a href="#"><?=$model['udk'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-calendar-check"></i> Yaratilgan vaqti:</li>
                <li><a href="#"><?=$model['created_at'];?></a></li>
            </ul>
            <div class="blog2-button">
                <a href="<?=Url::to(['library-ziyonet/view', 'id' => $model['id']])?>">Batafsil<i class="far fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>