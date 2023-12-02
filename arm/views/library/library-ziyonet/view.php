<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="books-index">
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumb-content">
                        <p></p>
                        <h3>Axborot resurs markazi</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumb-menu">
                        <ul>
                            <li><a href="/">Asosiy</a></li>
                            <li class="active"><a href="#">Sahifalar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-area blog-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-sidebar-inner">
                        <div class="row">

                            <div class="col-lg-12 col-12">
                                <?php foreach($categorys as $model){?>
                                    <div class="service-details-main">
                                        <div class="service-d-list-content">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="service-d-list-left">
                                                        <h5>Kitob haqida</h5>
                                                        <p><?=substr($model['title'], 0, 80) . '...'?></p>
                                                        <ul class="service-d-list-inner">
                                                            <li><i class="far fa-user"></i><b>Muallif:</b> Muallif</li>
                                                            <li><i class="far fa-language"></i><b>Til:</b> Til </li>
                                                            <li><i class="far fa-pencil"></i><b>Yozuv:</b> Yozuv</li>
                                                            <li><i class="far fa-bookmark"></i><b>Nashriyot:</b> Nashriyot</li>
                                                            <li><i class="far fa-print"></i><b>Chop etilgan yil:</b> Chopetilgan</li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu-right-btn">
                                                        <a href="<?=$mod->image.'#toolbar=0'?>" class="theme-btn">Online o'qish<i class="far fa-eye"></i></a>
                                                    </div>
                                                    <div class="menu-right-btn">
                                                        <a href="<?=$mod->image?>" class="theme-btn">Yuklab olish<i class="far fa-download"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="service-d-list-right">
                                                        <p><?=$mod->img?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service-details-content">
                                            <h3>Kitob haqida qisqacha izoh</h3>
                                            <p><?= $mod->short?>.</p>
                                        </div>
                                    </div>
                                <?php }?>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="blog-detail-sidebar">

                        <div class="singles-s-widget">
                            <form action="#" class="search-widget">
                                <input type="text" placeholder="Qidiruv ...">
                                <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
                            </form>
                        </div>

                        <div class="singles-s-widget categories-widget">
                            <h5 class="widget-title">Asosiy menular</h5>

                            <ul>
                                Menu
                            </ul>
                        </div>

                        <div class="singles-s-widget popular-feeds">
                            <iframe id="preview" style="border:0px;height:500px;width:350px;margin:5px;box-shadow: 0 0 16px 3px rgba(0,0,0,.2);" src="https://xn--r1a.website/s/samvmiARM"></iframe>
                        </div>

                        <div class="singles-s-widget socail-widget">
                            <h5 class="widget-title">Ijtimoiy tarmoqlar</h5>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>

</div>