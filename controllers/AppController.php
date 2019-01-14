<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.01.2019
 * Time: 9:34
 */

namespace app\controllers;


use yii\web\Controller;
use yii\helpers\Url;
use Yii;

class AppController extends Controller
{
    public function setMeta($title = null, $keywords = null, $description = null){

        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);

    }

    public function setPageCannonical(){
        if(Yii::$app->request->get('page') && Yii::$app->request->get('page') >=2){
            $this->view->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
        }
    }
}