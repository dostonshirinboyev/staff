<?php

use settings\forms\enum\EnumMenuCategoryForm;
use settings\status\enum\EnumMenuCategoryStatus;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $form EnumMenuCategoryForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>
    <div class="box-body">
        <?= $activeForm->errorSummary([$form]); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $activeForm->field($form, 'title_oz')->textInput() ?>
                <?= $activeForm->field($form, 'title_uz')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $activeForm->field($form, 'title_ru')->textInput() ?>
                <?= $activeForm->field($form, 'title_en')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $activeForm->field($form, 'code_name')->textInput() ?>
            </div>
        </div>
        <div class="form-group">
            <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => EnumMenuCategoryStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(!isset($model->isNewRecord) ? Yii::t('app', "Qo'shish") : Yii::t('app','Tahrirlash'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
