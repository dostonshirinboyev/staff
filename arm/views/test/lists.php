<?php

use settings\readModels\user\EmployeeReadRepository;
use yii\widgets\ListView;

/* @var $dataProvider EmployeeReadRepository */

$this->title = Yii::t('app',"O'qituvchilar");
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="section profile">
    <div class="row">
        <?= ListView::widget([
            'summary' => false,
            'dataProvider' => $dataProvider,
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_list',[
                    'model' => $model,
                    'key' => $key
                ]);
            },
        //    'layout' => "<div class='lst row'>{items}</div><div>{pager}</div>",
            'itemOptions' => [
                'tag' => false,
            ],
            'options' => [
                'id' => false,
                'tag' => 'div',
                'class' => 'row'
            ],
        ]); ?>
    </div>
</section>
