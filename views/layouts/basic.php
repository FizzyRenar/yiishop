<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container">

            <ul class="nav nav-pills">
                <li role="presentation" class="active"><?= Html::a('Главная', '/web/') ?></li>
                <li role="presentation"><?= Html::a('Статьи', ['post/index']) ?></li>
                <li role="presentation"><?= Html::a('Статья', ['post/show']) ?></li>
            </ul>

            <?= $content ?>

        </div>
    </div>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>