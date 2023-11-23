<?php

use kartik\date\DatePicker;
use kartik\select2\Select2;
use settings\forms\menu\search\MenuSearchForm;
use settings\helpers\LanguageHelper;
use settings\status\menu\MenuStatus;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchForm MenuSearchForm */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'Menyular');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
        <?= Html::a('<i class="fa fa-rotate-right"></i>', ['index'], ['class' => 'btn btn-info','title'=>Yii::t('app','Qayta yuklash')]) ?>
        <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
    </p>
    <div class="box box-info">
        <div class="box-body">
        <?= GridView::widget([
        'options' => ['class' => 'panel table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchForm,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'text-center', 'width' => '10%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '10%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '10%'],
            ],

            [
                'attribute' => 'title_uz',
                'headerOptions' => ['width' => '20%'],
                'filterOptions' => ['width' => '20%'],
                'contentOptions' => ['width' => '20%'],
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->title_oz, ['category/university-category/view', 'id' => $data->id]);
                },
            ],
            [
                'attribute' => 'code_name',
                'headerOptions' => ['class' => 'text-center', 'width' => '10%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '10%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '10%'],
                'format' => 'html',
            ],
            [
                'attribute' => 'created_by',
                'headerOptions' => ['class' => 'text-center', 'width' => '10%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '10%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '10%'],
                'format'    => 'html',
                'value'     => function ($data) {
                    if ($data->created_by) {
                        return $data->createdBy->username;
                    }
                    return null;
                },
            ],
            [
                'attribute' => 'parent_id',
                'value' => function ($data) {
                    if ($data->parent_id) {
                        return $data->parent->{LanguageHelper::getTitleLang()};
                    }
                    return null;
                },
                'headerOptions' => ['class' => 'text-center', 'width' => '10%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '10%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '10%'],
            ],
            [
                'attribute' => 'created_at',
                'headerOptions' => ['class' => 'text-center', 'width' => '20%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '20%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '20%'],
                'format'    => 'html',
                'filter' => DatePicker::widget([
                    'model' => $searchForm,
                    'attribute' => 'date_from',
                    'attribute2' => 'date_to',
                    'type' => DatePicker::TYPE_RANGE,
                    'separator' => '-',
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                    ],
                ]),
                'value' => function ($data) {
                    return date('d-m-Y', strtotime($data->created_at));
                },
            ],
            [
                'attribute' => 'status',
                'headerOptions' => ['class' => 'text-center', 'width' => '10%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '10%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '10%'],
                'format' => 'html',
                'filter' => Select2::widget([
                        'model' => $searchForm,
                        'attribute' => 'status',
                        'data' =>  ArrayHelper::map(MenuStatus::getStatusForSelect(), 'id', 'value'),
                        'options' => [
                            'id' => 'status',
                            'prompt' => Yii::t('app', '...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                ),
                'value'     => function ($data) {
                    if ($data->id) {
                        return MenuStatus::getStatusHtml($data, 'index');
                    }
                },
            ],
            [
                'header'=> Html::a(Yii::t('app','Menyu')),
                'headerOptions' => ['class' => 'text-center', 'width' => '10%'],
                'filterOptions' => ['class' => 'text-center', 'width' => '10%'],
                'contentOptions' => ['class' => 'text-center', 'width' => '10%'],
                'class' => ActionColumn::class,
                'buttons' => [
                    'view' => function($url,$model)
                    {
                        return Html::a(
                            '<i class="ace-icon fa fa-eye bigger-130"></i>',
                            ['view','id' => $model->id],
                            [
                                'title'=>Yii::t('yii','View'),
                                'class' => 'btn btn-info btn-xs'
                            ]
                        );
                    },

                    'update' => function($url,$model)
                    {
                        return Html::a(
                            '<i class="ace-icon fa fa-pencil bigger-130"></i>',
                            $url,
                            [
                                'title'=>Yii::t('yii','Update'),
                                'class' => 'btn btn-primary btn-xs'
                            ]
                        );
                    },

                    'delete' => function($url,$model)
                    {
                        return Html::a(
                            '<i class="ace-icon fa fa-trash-o bigger-130"></i>',
                            $url,
                            [
                                'title'=>Yii::t('yii','Delete'),
                                'data' =>
                                    [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method'=>'post'
                                    ],
                                'class' => 'btn btn-danger btn-xs'
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
        </div>
    </div>
</div>
