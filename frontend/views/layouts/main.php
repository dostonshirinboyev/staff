<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $userPersonalData UserPersonalDataRepository */

use frontend\assets\AppAsset;
use settings\repositories\user\UserPersonalDataRepository;
use yii\helpers\Html;
$userPersonalData = (new UserPersonalDataRepository())->get(Yii::$app->user->id);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

    <?= $this->render(
        'header.php',
        ['userPersonalData' => $userPersonalData]
    ); ?>

    <?= $this->render(
        'left.php'
    ); ?>

    <?= $this->render(
        'content.php',
        ['content' => $content]
    ); ?>

    <?= $this->render(
        'footer.php'
    ); ?>

    <?= Html::a(
        Html::tag('i', '', ['class' => 'bi bi-arrow-up-short']),
        '#', ['class' => 'back-to-top d-flex align-items-center justify-content-center']
    ) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();