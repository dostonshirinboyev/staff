<?php

use settings\forms\category\UniversityCategoryForm;
use settings\repositories\category\UniversityCategoryRepository;
use settings\status\category\UniversityCategoryStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this View */
/* @var $form UniversityCategoryForm */
/* @var $activeForm ActiveForm */
?>

<div class="road-form">

    <?php $activeForm = ActiveForm::begin(); ?>
    <div class="box-body">
        <?= $activeForm->errorSummary([$form]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $activeForm->field($form, 'title_oz')->textInput() ?>
                <?= $activeForm->field($form, 'title_uz')->textInput() ?>
                <?= $activeForm->field($form, 'title_ru')->textInput() ?>

            </div>
            <div class="col-md-6">
                <?= $activeForm->field($form, 'code_name')->textInput() ?>

                <?= $activeForm->field($form, 'parent_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(UniversityCategoryRepository::findParentForSelect(),'id','title_uz'),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Yuqori turuvchi katagoriyani tanalang") . ' --'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>
                <?= $activeForm->field($form, 'order')->textInput() ?>
            </div>
        </div>
        <div class="form-group">
            <?= $activeForm->field($form, 'status')->checkbox(!isset($model->isNewRecord) ? ['value' => UniversityCategoryStatus::STATUS_ACTIVE, 'checked' => true] : []); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(!isset($model->isNewRecord) ? Yii::t('app', "Qo'shish") : Yii::t('app','Tahrirlash'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
