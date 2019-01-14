<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Упс...';
?>
<div class="container text-center">
    <div class="logo-404">
        <a href="<?=Url::home();?>">
            <?=Html::img('@web/images/home/logo.png',['alt'=>'404'])?>
        </a>
    </div>
    <div class="content-404">
        <?=Html::img('@web/images/404/404.png',['alt'=>'404','title'=>'Error 404', 'class' => 'img-responsive'])?>
        <h1><?= Html::encode($this->title) ?></h1>

        <p><?= nl2br(Html::encode($message)) ?></p>
        <h2><a href="<?=Url::home();?>">На главную</a></h2>
    </div>
</div>
