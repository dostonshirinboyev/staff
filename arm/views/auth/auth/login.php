<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <?= Html::tag('h3', Yii::t('app', "HemisID orqali kirish"));?>
                    <?= Html::tag('p', Yii::t('app', "Tizimga Samarqand davlat veterinariya meditsinasi, chorvachilik va bitexnologiyalar universiteti <br> axborot resurs markazidan berilgan HemisID va parol orqali kiriladi."));?>
                    <div class="heading-divider"></div>
                </div>
                <div class="contact-details">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-c-details">
                                <?= Html::beginForm(['employee-login'], 'get')
                                    . Html::submitButton(
                                        Html::tag('i', '', ['class' => 'fas fa-user-tie']),
                                    ['class' => 'contact-d-icon'])
                                    . Html::endForm()
                                ?>
                                <div class="contact-d-content">
                                    <?= Html::tag('h3', Yii::t('app', "Hodim"))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-c-details active">
                                <?= Html::beginForm(['teacher-login'], 'POST')
                                    . Html::submitButton(
                                        Html::tag('i', '', ['class' => 'fas fa-chalkboard-teacher']),
                                        ['class' => 'contact-d-icon'])
                                    . Html::endForm()
                                ?>
                                <div class="contact-d-content">
                                    <?= Html::tag('h3', Yii::t('app', "O'qituvchi"))?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-c-details">
                                <?= Html::beginForm(['student-login'], 'POST')
                                    . Html::submitButton(
                                        Html::tag('i', '', ['class' => 'fas fa-user-graduate']),
                                        ['class' => 'contact-d-icon'])
                                    . Html::endForm()
                                ?>
                                <div class="contact-d-content">
                                    <?= Html::tag('h3', Yii::t('app', "Talaba"))?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>