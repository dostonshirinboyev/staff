<?php

use settings\helpers\GenderHelper;
use settings\helpers\LanguageHelper;
use settings\readModels\library\LibraryCategoryReadRepository;
use settings\readModels\user\EmployeeReadRepository;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $model EmployeeReadRepository */
/* @var $library_category_provider LibraryCategoryReadRepository */

$this->title = ucwords(strtolower($model['full_name']));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app',"O'qituvchilar"), 'url' => ['user/employee/lists']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

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
                                        return Html::img('@web/avatar/m.png', ['class' => 'rounded-circle']);
                                    } elseif (($data['gender']['code'] == GenderHelper::GENDER_FEMALE) && ($data['image'] == null)) {
                                        return Html::img('@web/avatar/f.png', ['class' => 'rounded-circle']);
                                    } else {
                                        return Html::img($data['image'], ['class' => 'rounded-circle']);
                                    }
                                },
                            ],
                            [
                                'label' => false,
                                'format' => 'html',
                                'value' => function ($data) {
                                    return Html::tag('h2', ucwords(strtolower($data['full_name'])));
                                },
                            ],
                            [
                                'label' => false,
                                'format' => 'html',
                                'value' => function ($data) {
                                    return Html::tag('h3', $data['staffPosition']['name']);
                                },
                            ]
                        ],
                    ]) ?>

                    <div class="profile-overview">
                        <?=Html::tag('h5', Yii::t('app', "Ma'lumotlar:"), ['class' => 'card-title'])?>
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<div class="row"><div class="col-lg-3 col-md-4 label ">{label}</div><div class="col-lg-9 col-md-8">{value}</div></div>',
                            'options' => [
                                'tag' => false
                            ],
                            'attributes' => [
                                [
                                    'label' => Yii::t('app', "FIO"),
                                    'value' => function ($data) {
                                        return ucwords(strtolower($data['full_name']));
                                    },
                                ],
                                [
                                    'label' => Yii::t('app', "Kafedra"),
                                    'value' => function ($data) {
                                        return $data['department']['name'];
                                    },
                                ]
                            ],
                        ]) ?>

                        <?=Html::tag('h5', Yii::t('app', "Bog'lanish:"), ['class' => 'card-title'])?>
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<div class="row"><div class="col-lg-3 col-md-4 label ">{label}</div><div class="col-lg-9 col-md-8">{value}</div></div>',
                            'options' => [
                                'tag' => false
                            ],
                            'attributes' => [
                                [
                                    'label' => Yii::t('app', "Telefon"),
                                    'value' => function ($data) {
                                        return '+99890 123 45 67';
                                    },
                                ],
                                [
                                    'label' => Yii::t('app', "E-pochta"),
                                    'value' => function ($data) {
                                        return 'example.gmail.com';
                                    },
                                ]
                            ],
                        ]) ?>


                        <?=Html::tag('h5', Yii::t('app', "Foydalanuvchi hisoblari:"), ['class' => 'card-title'])?>
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<div class="row"><div class="col-lg-3 col-md-4 label ">{label}</div><div class="col-lg-9 col-md-8">{value}</div></div>',
                            'options' => [
                                'tag' => false
                            ],
                            'attributes' => [
                                [
                                    'label' => Yii::t('app', "Telegram"),
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return '<div class="social-links mt-2">
                                        <a href="#" class="telegram"><i class="bi bi-telegram"></i></a>
                                    </div>';
                                    },
                                ],
                                [
                                    'label' => Yii::t('app', "Facebook"),
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return '<div class="social-links mt-2">
                                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    </div>';
                                    },
                                ],
                                [
                                    'label' => Yii::t('app', "Instagram"),
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return '<div class="social-links mt-2">
                                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    </div>';
                                    },
                                ],
                                [
                                    'label' => Yii::t('app', "Google"),
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return '<div class="social-links mt-2">
                                        <a href="#" class="google"><i class="bi bi-google"></i></a>
                                    </div>';
                                    },
                                ],
                            ],
                        ]) ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <?= ListView::widget([
                        'summary' => false,
                        'summaryOptions' => [
                            'tag' => false
                        ],
                        'pager' => false,
                        'dataProvider' => $library_category_provider,
                        'itemView' => function ($model, $key, $index, $widget) {
                            return Html::button($model->{LanguageHelper::getTitleLang()}, [
                                'class' => $index == 0 ? 'nav-link active' : 'nav-link',
                                'data-bs-toggle' => 'tab',
                                'data-bs-target' => "#profile-{$model->code_name}"
                            ]);
                        },
                        'itemOptions' => [
                            'tag' => 'li',
                            'class' => 'nav-item',
                        ],
                        'options' => [
                            'id' => false,
                            'tag' => 'ul',
                            'class' => "nav nav-tabs nav-tabs-bordered"
                        ],
                    ]); ?>

                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">About</h5>
                            <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company</div>
                                <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Job</div>
                                <div class="col-lg-9 col-md-8">Web Designer</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Country</div>
                                <div class="col-lg-9 col-md-8">USA</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form>
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="assets/img/profile-img.jpg" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="country" type="text" class="form-control" id="Country" value="USA">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-settings">

                            <!-- Settings Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                            <label class="form-check-label" for="changesMade">
                                                Changes made to your account
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                            <label class="form-check-label" for="newProducts">
                                                Information on new products and services
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="proOffers">
                                            <label class="form-check-label" for="proOffers">
                                                Marketing and promo offers
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                            <label class="form-check-label" for="securityNotify">
                                                Security alerts
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End settings Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
<!--<section class="section profile">-->
<!--    <div class="row">-->
<!--        <div class="col-xl-3">-->
<!--            <div class="card">-->
<!--                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">-->
<!--                    --><?//= DetailView::widget([
//                        'model' => $model,
//                        'options' => [
//                            'tag' => false
//                        ],
//                        'attributes' => [
//                            [
//                                'label' => false,
//                                'format' => 'html',
//                                'value' => function ($data) {
//                                    if (($data['gender']['code'] == GenderHelper::GENDER_MALE) && ($data['image'] == null)) {
//                                        return Html::img('@web/avatar/m.png', ['class' => 'rounded-circle']);
//                                    } elseif (($data['gender']['code'] == GenderHelper::GENDER_FEMALE) && ($data['image'] == null)) {
//                                        return Html::img('@web/avatar/f.png', ['class' => 'rounded-circle']);
//                                    } else {
//                                        return Html::img($data['image'], ['class' => 'rounded-circle']);
//                                    }
//                                },
//                            ],
//                            [
//                                'label' => false,
//                                'format' => 'html',
//                                'value' => function ($data) {
//                                    return Html::tag('h2', ucwords(strtolower($data['short_name'])));
//                                },
//                            ],
//                            [
//                                'label' => false,
//                                'format' => 'html',
//                                'value' => function ($data) {
//                                    return Html::tag('h3', $data['staffPosition']['name']);
//                                },
//                            ],
//                            [
//                                'label' => false,
//                                'format' => 'html',
//                                'value' => function ($data) {
//                                    return '<div class="social-links mt-2">
//                                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
//                                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
//                                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
//                                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
//                                    </div>';
//                                },
//                            ],
//                        ],
//                    ]) ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
