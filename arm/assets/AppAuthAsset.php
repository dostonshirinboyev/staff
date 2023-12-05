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
        'css/bootstrap.min.css',
        'css/cube-portfolio.min.css',
        'css/maginific-popup.min.css',
        'css/animate.min.css',
        'css/owl.carousel.min.css',
        'css/jquery.fancybox.css',
        'css/fontawesome.min.css',
        'css/slicknav.min.css',
        'css/default.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
       ['src' => '../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js', 'data-cfasync' => "false"],
        'js/jquery-3.6.0.min.js',
        'js/bootstrap.bundle.min.js',
        'js/owl.carousel.min.js',
        'js/cube-portfolio.min.js',
        'js/magnific-popup.min.js',
        'js/jquery-fancybox.min.js',
        'js/wow.min.js',
        'js/waypoints.min.js',
        'js/jquery.counterup.min.js',
        'js/finalcountdown.min.js',
        'js/typed.min.js',
        'js/jquery.slicknav.min.js',
        'js/contact-form.js',
        'js/main.js'
    ];
}