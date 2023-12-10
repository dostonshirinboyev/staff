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
        '<_a:login|logout|employee-login|teacher-login|student-login>' => 'auth/auth/<_a>',
//        '<_a:lists|list>' => 'library/library-ziyonet/<_a>',
        'ziyonet' => 'library/library-ziyonet/lists',
        'ziyonet/<action:(category-list)>/<id:\d+>'  => 'library/library-ziyonet/<action>',
        'unilibrary' => 'library/library-unilibrary/lists',
        'unilibrary/<action:(list|category-list)>/<id:\d+>'  => 'library/library-unilibrary/<action>',
    ],
];