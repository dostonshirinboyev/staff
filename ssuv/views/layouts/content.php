<?php

/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>
<main id="main" class="main">

    <div class="pagetitle">
        <?=Html::tag('h1', $this->title)?>
        <nav>
            <?php try {
                echo Breadcrumbs::widget([
                    'homeLink' => ['label' => Html::tag('i', "",['class' => "bi bi-house-fill"])." ".Yii::t('app', "Bosh sahifa"), 'url' => Yii::$app->urlManager->createUrl("/")],
                    'itemTemplate' => Html::tag('li',"{link}", ['class' => 'breadcrumb-item']) . "\n",
                    'activeItemTemplate' => Html::tag('li', "{link}", ['class' => 'breadcrumb-item active']) . "\n",
                    'tag' => 'ol',
                    'links' => !empty($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumb'],
                    'encodeLabels' => false,
                ]);
            } catch ( Exception $e ) {
                echo $e->getMessage();
            } ?>
        </nav>
    </div><!-- End Page Title -->

<!--    <section class="section dashboard">-->

        <?= $content;?>

<!--    </section>-->

</main><!-- End #main -->