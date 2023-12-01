<?php

use yii\grid\GridView;

?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchForm,

    'columns' => [
        [
            'attribute' => 'id',
        ],
    ],
]); ?>