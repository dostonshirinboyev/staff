<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use settings\integrations\library\LibraryCategoryZiyonetIntegration;
use settings\readModels\library\LibraryZiyonetReadRepository;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = Yii::$app->name;

?>
<section class="blog-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="blog-detail-sidebar">

                    <div class="singles-s-widget">
                        <form action="#" class="search-widget" method="get">
                            <input type="text"  name="search" placeholder="Kitob qidirish uchun nomini kiriting..." required>
                            <button type="submit"  class="search-btn"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="industries-area blog-area blog-page-area">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="section-title">
                        <div class="industries-tab-menu text-center mb-5">
                            <ul class="menu-tab-menu nav nav-tabs tab-menu-flex" role="tablist" data-bs-toggle="tab-hover">
                                <li class="nav-item">
                                    <?= Html::a(Yii::t('app', "E-library"), ['/'], ['class' => 'animated shadow-lg']);?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a(Yii::t('app', "Unilibrary"), ['library/library-unilibrary/lists'], ['class' => 'animated shadow-lg active']);?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a(Yii::t('app', "ZiyoNET"), ['library/library-ziyonet/lists'], ['class' => 'animated shadow-lg']);?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a(Yii::t('app', "Milliy kutubxona"), ['library/library-ziyonet/lists'], ['class' => 'animated shadow-lg']);?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="industries-tab-inner" id="library" role="tabpanel" aria-labelledby="library-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="industries-tab-menu" style="align: center">
                                <ul class="menu-tab-menu nav nav-tabs " data-bs-toggle="tab-hover" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">
                                    <li class="nav-item">
                                        <a href="<?= Url::to(['lists'])?>" class="animated active" style="box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;">
                                            <?= Html::tag('div', Yii::t('app', "Barchasi"))?>
                                        </a>
                                    </li>
                                    <?php foreach ($categorys as $key => $category):?>
                                        <li class="nav-item">
                                            <a href="<?=Url::to(['library/library-unilibrary/category-list', 'id' => $category['id']])?>" class="animated" style="box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;">
                                                <div><?php echo $category['name'] ?></div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <section class="blog-area ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="blog-detail-sidebar">

                                            <div class="singles-s-widget">
                                                <form action="#" class="search-widget" method="get">
                                                    <input type="text"  name="search" placeholder="Kitob qidirish uchun nomini kiriting..." required>
                                                    <button type="submit"  class="search-btn"><i class="far fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab4">
                                    <div class="industries-tab-inner">
                                        <?= ListView::widget([
                                            'summary' => true,
                                            'dataProvider' => $dataProvider,
                                            'itemView' => function ($model, $key, $index, $widget) {
                                                return $this->render('_list',[
                                                    'model' => $model,
                                                    'key' => $key
                                                ]);
                                            },
                                            'itemOptions' => [
                                                'tag' => false,
                                            ],
                                            'options' => [
                                                'id' => false,
                                                'tag' => false
                                            ],
                                            'layout' => '
                                                    {summary}
                                                <div class="row">
                                                    {items}
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="pagination-main">
                                                            {pager}      
                                                        </div>
                                                    </div>
                                                </div>',
                                            'pager' => [
                                                'options' => [
                                                    'class' => 'pagination'
                                                ],
                                                'prevPageLabel' => Html::tag('i', '', ['class' => 'fas fa-long-arrow-left']),
                                                'nextPageLabel' => Html::tag('i', '', ['class' => 'fas fa-long-arrow-right']),
                                                'maxButtonCount' => 5,
                                            ],
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab5">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab6">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab7">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab8">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab9">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab10">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab11">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab12">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab13">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab14">
                                    <div class="industries-tab-inner">
                                        <div class="row">

                                            <div class="col-lg-4 col-md-6 col-12 wow fadeIn" data-wow-delay="0.2s">

                                                <div class="single-blog2">

                                                    <div class="blog2-image">
                                                        <img src="/img/blog/1.jpg" alt="#">
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

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>