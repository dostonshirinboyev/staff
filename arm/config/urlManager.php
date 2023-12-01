<?php

/** @var array $params */

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['armHostInfo'],
    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'cache' => false,
    'rules' => [
        '' => 'site/index',
        '<_a:login|logout|hemis-employee-login|hemis-student-login>' => 'auth/auth/<_a>',
//        '<_a:lists|list>' => 'library/library-ziyonet/<_a>',
        'library-ziyonet/lists' => 'library/library-ziyonet/lists',
        'library-ziyonet/<action:(category-list)>/<id:\d+>'  => 'library/library-ziyonet/<action>',
    ],
];