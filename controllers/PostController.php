<?php
namespace app\controllers;

use Yii;
use app\models\TestForm;

class PostController extends AppController{

    public $layout = 'basic';

    public function beforeAction($action)
    {
        if($action->id == 'index'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex(){
        if( Yii::$app->request->isAjax ){

            return var_dump(Yii::$app->request->post());
        }

        $model = new TestForm();

        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        return $this->render('test', compact('model'));
    }

    public function actionShow(){
        $this->view->title = 'Одна статья!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевые слова']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета описание']);
        return $this->render('show');
    }

} 