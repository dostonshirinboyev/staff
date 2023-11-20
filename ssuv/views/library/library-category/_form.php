<?php

use settings\forms\library\LibraryCategoryForm;
use settings\status\GeneralStatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form LibraryCategoryForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="row">
            <?= $activeForm->field($form, 'title_uz')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'title_oz')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'title_ru')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'code_name')->textInput(['maxlength' => true]) ?>
            <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => GeneralStatus::STATUS_ENABLED, 'checked' => true] : []); ?>
        </div>
        <div class="form-group">
            <div class="form-group">
                <?= Html::submitButton(!isset($model->isNewRecord) ? Yii::t('app', "Qo'shish") : Yii::t('app','Tahrirlash'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
