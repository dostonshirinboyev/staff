<?php

use settings\readModels\library\LibraryUnilibraryReadRepository;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $model LibraryUnilibraryReadRepository */

?>

<div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

    <div class="single-blog2">

        <div class="blog2-image">
<!--        --><?//= Html::img($model['publisher_resource_icon'], ['alt' => '#'])?>
            <div class="single-service service-4">
                <div class="service-icon">
                    <i class="fal fa-book"></i>
                </div>
            </div>
            <div class="post-date">
<!--                --><?//= date('d-M', strtotime($model['created_at']))?><!-- <span>--><?//= date('Y', strtotime($model['created_at']))?><!--</span>-->
            </div>
        </div>

        <div class="blog2-content">
            <h3><a href="<?= Url::to(['library/library-unilibrary/list', 'id' => $model['id']])?>"><?=substr($model['name'], 0, 80) . '...'?></a></h3>
            <ul class="blog2-meta">
                <li><i class="far fa-user"></i> Muallif:</li>
                <li><a href="#"><?=$model['authors'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-calendar"></i> Nashir etilgan yili:</li>
                <li><a href="#"><?=$model['publisher_year'];?></a></li>
            </ul>
            <ul class="blog2-meta">
                <li><i class="far fa-calendar-check"></i> Nashriyot:</li>
                <li><a href="#"><?=$model['publisher_name'];?></a></li>
            </ul>
            <div class="blog2-button">
                <a href="<?= Url::to(['library/library-unilibrary/list', 'id' => $model['id']])?>">Batafsil<i class="far fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>