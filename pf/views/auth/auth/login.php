<?php

use yii\helpers\Html;

?>
<h4 class="card-title text-center">HemisID orqali kiring</h4>
<div class="row">
    <div class="col-6 mt-3">
        <?= Html::beginForm(['hemis-employee-login'], 'post', ['class' => 'd-grid'])
            . Html::submitButton(
      Html::img('@web/logo/teacher.png', ['class' =>'text-primary', 'alt' => Yii::t('app',"O'qituvchi"), 'style' => 'height: 50px']) .' '. Yii::t('app', "O'qituvchi"),
                ['class' => 'btn btn-light']
            )
            . Html::endForm()
        ?>
    </div><!--end col-->

    <div class="col-6 mt-3">
        <?= Html::beginForm(['hemis-student-login'], 'post', ['class' => 'd-grid'])
        . Html::submitButton(
            Html::img('@web/logo/student.png', ['class' =>'text-primary', 'alt' => Yii::t('app',"Talaba"), 'style' => 'height: 50px']) .' '. Yii::t('app', "Talaba"),
            ['class' => 'btn btn-light']
        )
        . Html::endForm()
        ?>
    </div><!--end col-->
</div>