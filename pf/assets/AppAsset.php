<?php

namespace pf\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/bootstrap-icons/bootstrap-icons.css',
        'vendor/boxicons/css/boxicons.min.css',
        'vendor/quill/quill.snow.css',
        'vendor/quill/quill.bubble.css',
        'vendor/remixicon/remixicon.css',
        'vendor/simple-datatables/style.css',
        'css/style.css',
    ];
    public $js = [
        'vendor/apexcharts/apexcharts.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/chart.js/chart.umd.js',
        'vendor/echarts/echarts.min.js',
        'vendor/quill/quill.min.js',
        'vendor/simple-datatables/simple-datatables.js',
        'vendor/tinymce/tinymce.min.js',
        'vendor/php-email-form/validate.js',
        'js/main.js'
    ];
//    public $depends = [
////        'yii\web\YiiAsset',
////        'yii\bootstrap\BootstrapAsset',
//    ];
}