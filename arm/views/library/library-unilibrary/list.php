<?php

use settings\integrations\library\LibraryUnilibraryIntegration;
use yii\widgets\DetailView;
/* @var $model LibraryUnilibraryIntegration */

?>

<section class="blog-area blog-page-area">
    <div class="container">
        <div class="row">
            <?php foreach ($model as $mod) {?>
            <div class="col-lg-9 col-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-info shadow-custom">
                        <div class="row" style="align-items: center">
                            <div class="col-lg-4">
                                <div class="blog-d-head-img">
                                    <div class="product-slider text-center">
                                        <a data-fancybox="product-image" data-src="/books/image/1698124826.jpg">
                                            <img src="<?=$mod["publisher_resource_icon"]?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-detail-info">
                                    <div class="blog-d-tag-widget">
                                        <ul>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-download"></i> Yuklab olish
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 hr-custom">
                                <div class="blog-d-head-title">
                                    <div class="blog-single-meta">
                                        <ul>
                                            <li>
                                                <h3>
                                                    Tibbiy bilim asoslari
                                                </h3>
                                            </li><br>
                                            <li>
                                                <i class="fa fa-eye"></i><span> 1148 </span> |
                                                <i class="fa fa-download"></i><span> 821</span>
                                            </li><br>
                                            <li>
                                                <b>
                                                    ISBN:
                                                </b>
                                                <?=$mod["isbn"]?>
                                            </li><br>
                                            <li>
                                                <b>
                                                    Muallif:
                                                </b>
                                                <?=$mod["authors"]?>
                                            </li><br>
                                            <li>
                                                <b>
                                                    Til:
                                                </b>
                                                <?=$mod["resource_language_name"]?>
                                            </li><br>
                                            <li>
                                                <b>
                                                    Yozuv:
                                                </b>
                                                <?=$mod["resource_language_name"]?>
                                            </li><br>
                                            <li>
                                                <b>
                                                    Resurs turi:
                                                </b>
                                                o'quv qo'llanma
                                            </li><br>
                                            <li>
                                                <b>
                                                    Betlar soni:
                                                </b>
                                                <?=$mod["resource_page_count"]?>
                                            </li><br>
                                            <li>
                                                <b>
                                                    Nashriyot:
                                                </b>
                                                <?=$mod["publisher_name"]?>
                                            </li><br>
                                            <li>
                                                <b>
                                                    Chop etilgan yili:
                                                </b>
                                                <?=$mod["publisher_year"]?>
                                            </li><br>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-detail-content shadow-custom">
                        <h4>
                            Kitob ta'rifi                        </h4>
                        <hr>
                        <p>
                            <?=$mod["abstract_name"]?>
                        </p>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="singles-s-widget popular-feeds">
                    <iframe id="preview" style="border:0px;height:500px;width:350px;margin:5px;box-shadow: 0 0 16px 3px rgba(0,0,0,.2);" src="https://xn--r1a.website/s/samvmiARM"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>