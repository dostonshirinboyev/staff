<?php

namespace pf\assets;

use yii\web\AssetBundle;

/**
 * Main pf application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/materialdesignicons.min.css',
//        'https://unicons.iconscout.com/release/v3.0.6/css/line.css',
        'css/tiny-slider.css',
        'css/style.css',
        'css/colors/default.css'
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/tiny-slider.js',
        'js/feather.min.js',
        'js/switcher.js',
        'js/plugins.init.js',
        'js/app.js'
    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}