<?php

namespace arm\controllers\library;

use yii\web\Controller;

class LibraryController extends Controller
{
    public function actionUnilibrary()
    {
        return $this-render('unilibrary');
    }
}