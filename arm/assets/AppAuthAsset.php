<?php

namespace arm\assets;

use yii\web\AssetBundle;

/**
 * Main arm application asset bundle.
 */
class AppAuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        ['href' => 'css/bootstrap.min.css', 'rel' => 'stylesheet', 'type' => 'text/css'],
        ['href' => 'https://unicons.iconscout.com/release/v3.0.6/css/line.css', 'rel' => 'stylesheet'],
        ['href' => 'css/style.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'id' => 'theme-opt'],
        ['href' => 'css/colors/default.css', 'rel' => 'stylesheet', 'type' => 'text/css', 'id' => 'color-opt']
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/feather.min.js',
        'js/switcher.js',
        'js/plugins.init.js',
        'js/app.js',
    ];
}