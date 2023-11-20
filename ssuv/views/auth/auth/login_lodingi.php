<?php

use settings\forms\auth\student\LoginStudentForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginStudentForm */

$this->title = Yii::t('app','Kirish');
$this->params['breadcrumbs'][] = $this->title;
$test = Yii::t("app",'Parolni tiklamoqchimisiz?');
?>
<div class="card-body">

    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Kirish</h5>
        <p class="text-center small">Hemis ID va parolini tering</p>
    </div>
    <?php $form = ActiveForm::begin([
        'options'=> [
            'class' => 'row g-3 needs-validation',
            'novalidate' => true
        ]
    ]); ?>

    <?= $form->field($model, 'hemis_id', [
        'options' =>  [
            'tag' => 'div',
            'class' => 'col-12'
        ],
        'template' => '
                {label}' .
            Html::tag('div',
                Html::tag('span', Html::tag('i', '', ['class' => 'bx bxs-user']), ['class' => 'input-group-text', 'id' => 'hemis_id']) .
                '{input}{hint}{error}',
                ['class' => 'input-group has-validation'])
        ,
        'errorOptions' => [
            'tag' => 'div',
            'class' => 'invalid-feedback'
        ],
        'labelOptions' => [ 'class' => 'form-label' ]
    ])->textInput(
        [
            'id' => 'hemis_id',
            'class' => 'form-control',
            'aria-required' => false,
            'required' => true,
            'placeholder' => Yii::t('app', "Hemis ID raqami"),
        ]
    ) ?>

    <?= $form->field($model, 'hemis_password', [
            'options' => [
                'tag' => 'div',
                'class' => 'col-12'
            ],
            'template' => '
                    {label}' .
                Html::tag('div',
                    Html::tag('span', Html::tag('i', '', ['class' => 'ri-key-fill']), ['class' => 'input-group-text', 'id' => 'hemis_password']) .
                    '{input}{hint}{error}',
                    ['class' => 'input-group has-validation'])
            ,
            'labelOptions' => [ 'class' => 'form-label' ],
            'errorOptions' => [
                'tag' => 'div',
                'class' => 'invalid-feedback'
            ],
        ]
    )->passwordInput([
        'id' => 'hemis_password',
        'class' => 'form-control',
        'aria-required' => false,
        'required' => true,
        'placeholder' => '············',
    ]);?>
    <?= $form->field($model, 'rememberMe', [
            'options' => [
                'tag' => 'div',
                'class' => 'col-12',
            ],
            'labelOptions' => [
                'class' => 'form-check-label'
            ],
            'template' => Html::tag('div', '{input}' .
                Html::tag('div', '{label}' . Html::a(Yii::t('app', 'Parolni tiklash'), '#'), ['class' => 'd-flex justify-content-between'])
                . '{error}{hint}', ['class' => 'form-check'])
        ]
    )->checkbox(['class' => 'form-check-input'], false) ?>

    <?= Html::tag('div', Html::submitButton($this->title, ['class' => 'btn btn-primary w-100']), ['class' => 'col-12'])?>

    <div class="col-12">
        <!-- Small Modal -->
        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#smallModal">
            <?=Html::img('@web/university.png', ['style' => 'height:20px', 'alt' => 'Hemis'])?>
            Hemis ID tizimi orqali kirish
        </button>

        <div class="modal fade" id="smallModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!--                            --><?//=
                        //                                Html::beginForm(['/auth/auth/logout'], 'post', ['class' => 'form-inline'])
                        //                                . Html::submitButton(
                        //                                    'Logout',
                        //                                    ['class' => 'btn btn-link logout']
                        //                                )
                        //                                . Html::endForm()
                        //                            ?>
                        <!--                            <a class="btn btn-info rounded-pill" methods="POST" href="--><?//= Url::to('/hemis-student-login');?><!--">--><?//= Html::img('@web/student.png', ['style' => 'height:35px', 'alt' => 'Student']) . ' ' . Yii::t('app', "Talaba"); ?><!--</a>-->
                        <!--                            <a class="btn btn-info rounded-pill" methods="POST" href="--><?//= Url::to('/hemis-student-login');?><!--">--><?//= Html::img('@web/teacher.png', ['style' => 'height:35px', 'alt' => 'Student']) . ' ' . Yii::t('app', "O'qituvchi"); ?><!--</a>-->
                        <?=Html::a(Html::img('@web/student.png', ['style' => 'height:35px', 'alt' => 'Student']) . Yii::t('app', "Talaba"), 'hemis-student-login', ['class' => 'btn btn-info rounded-pill'])?>
                        <?=Html::a(Html::img('@web/teacher.png', ['style' => 'height:35px', 'alt' => 'Student']) . Yii::t('app', "O'qituvchi"), 'hemis-employee-login', ['class' => 'btn btn-info rounded-pill'])?>
                    </div>
                </div>
            </div>
        </div><!-- End Small Modal-->
    </div>

    <?= Html::tag('div', Html::tag('p', Yii::t('app', 'Hemis ID orqali') . ' ' . Html::a(Yii::t('app', "Ro'yxatdan o'ting"),'#'), ['class' => 'small mb-0']), ['class' => 'col-12'])?>

    <?php ActiveForm::end(); ?>
</div>