<?php

use settings\forms\library\search\LibraryCategorySearchForm;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchForm LibraryCategorySearchForm */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', "Kutubxona kategoriyalari");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
        <?= Html::a('<i class="fa fa-rotate-right"></i>', ['/road'], ['class' => 'btn btn-info','title'=>Yii::t('app','Qayta yuklash')]) ?>
        <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
    </p>
    <div class="box">
        <div class="box-body">
        <?= GridView::widget([
        'options' => ['class' => 'panel table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchForm,
        'columns' => [
            'id',
            'title_ru',
            'title_uz',
            'title_oz',
            'code_name',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]); ?>
        </div>
    </div>
</div>
