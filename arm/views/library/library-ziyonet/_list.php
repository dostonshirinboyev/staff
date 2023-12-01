<?php

use settings\readModels\library\LibraryZiyonetReadRepository;
use yii\helpers\Html;
/* @var $model LibraryZiyonetReadRepository */
?>

<div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

    <div class="single-blog2">

        <div class="blog2-image">
            <?= Html::img($model['cover'], ['alt' => '#'])?>
            <div class="post-date">
                June 27 <span>2021</span>
            </div>
        </div>

        <div class="blog2-content">
            <ul class="blog2-meta">
                <li><i class="far fa-folder-open"></i></li>
                <li><a href="#">Data Strategy</a></li>
            </ul>
            <h3><a href="blog-details.html">The Current State Of Artificial Intelligence</a></h3>
            <p>Integer id semper odio. Suspendisse arcu est, elementum accumsan libero vitae, lobortis dictum sem. Integer semper velit augue, at tristique ligula porta ut. </p>
            <div class="blog2-button">
                <a href="blog-details.html">Read More<i class="far fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>