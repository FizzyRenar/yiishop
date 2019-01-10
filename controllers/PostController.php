<?php
namespace app\controllers;

use Yii;

class PostController extends AppController{

    public $layout = 'basic';

    public function beforeAction($action)
    {
       // $this->debug($action);
//        return parent::beforeAction($action);
    }

    public function actionIndex(){
        if( Yii::$app->request->isAjax ){
            debug(Yii::$app->request->post());
            return 'test';
        }
        return $this->render('test');
    }

    public function actionShow(){
//        $this->layout = 'basic';
        return $this->render('show');
    }

} 