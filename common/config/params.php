<?php
$params = array_merge(
    require __DIR__ . '/params-local.php'
);
return [
    'adminEmail' => 'admin@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'user.rememberMeDuration' => 3600 * 24 * 30,
    'cookieDomain' => $params['cookieDomain'],
    'ssuvHostInfo' => $params['ssuvHostInfo'],
    'armHostInfo' => 'http://staff',
    'frontendHostInfo' => 'http://127.0.0.1:8022',
    'backendHostInfo' => 'http://staff/admin',
    'mailChimpKey' => '',
    'mailChimpListId' => '',
];