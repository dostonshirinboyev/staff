<?php

use settings\helpers\GenderHelper;
use settings\readModels\user\EmployeeReadRepository;
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $model EmployeeReadRepository */
?>
<div class="col-xl-3">
    <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'tag' => false
                ],
                'attributes' => [
                    [
                        'label' => false,
                        'format' => 'html',
                        'value' => function ($data) {
                            if (($data['gender']['code'] == GenderHelper::GENDER_MALE) && ($data['image'] == null)) {
                                return Html::a(Html::img('@web/avatar/m.png', ['class' => 'rounded-circle']), ['user/employee/list', 'id' => $data['employee_id_number']]);
                            } elseif (($data['gender']['code'] == GenderHelper::GENDER_FEMALE) && ($data['image'] == null)) {
                                return Html::a(Html::img('@web/avatar/f.png', ['class' => 'rounded-circle']), ['user/employee/list', 'id' => $data['employee_id_number']]);
                            } else {
                                return Html::a(Html::img($data['image'], ['class' => 'rounded-circle']), ['user/employee/list', 'id' => $data['employee_id_number']]);
                            }
                        },
                    ],
                    [
                        'label' => false,
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::tag('h2', ucwords(strtolower($data['short_name'])));
                        },
                    ],
                    [
                        'label' => false,
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::tag('h3', $data['staffPosition']['name']);
                        },
                    ],
                    [
                        'label' => false,
                        'format' => 'html',
                        'value' => function ($data) {
                            return '<div class="social-links mt-2">
                                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                    </div>';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>



<!--<div class="col-xl-3">-->
<!--    <div class="card">-->
<!--        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">-->
<!---->
<!--            <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">-->
<!--            <h2>Kevin Anderson</h2>-->
<!--            <h3>Web Designer</h3>-->
<!--            <div class="social-links mt-2">-->
<!--                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
<!--                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>-->
<!--                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>-->
<!--                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
