<?php
namespace app\controllers;

use app\models\Category;
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

        //update
//        $post = TestForm::findOne(3);
//        $post->email ="2@2.com";
//        $post->save();

        //удаление
      //  $delete = TestForm::findOne(2);
       // $delete->delete();
//        TestForm::deleteAll(['>','id',3]);
      //  TestForm::deleteAll();

        //добавление
        $model = new TestForm();
        if($model->load(Yii::$app->request->post())){
            if($model->save()){
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


//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//        $cats = Category::find()->asArray()->where('parent = 691')->all();
//        $cats = Category::find()->asArray()->where(['parent' => 691])->all();
//        $cats = Category::find()->asArray()->where(['like','title', 'pp'])->all();
//        $cats = Category::find()->asArray()->where(['<=','id',695])->all();
//        $cats = Category::find()->asArray()->where('parent = 691')->limit(1)->all(); //правильный запрос
//        $cats = Category::find()->asArray()->where('parent = 691')->one(); //избыточный запрос
//        $cats = Category::find()->asArray()->count();
//        $cats = Category::findOne(['parent' => 691]); // asArray() не сработает ; избыточный запрос
//        $cats = Category::findAll(['parent' => 691]);

//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'"; //не совсем правильно для yii
//        $query = "SELECT * FROM categories WHERE title LIKE :search"; //более правильно для yii
//        $cats = Category::findBySql($query, [':search' => '%pp%'])->all();

//        $cats = Category::findOne(694); //отлож. запрос
//        $cats = Category::find()->with('products')->where('id=694')->all(); //жадный запрос
        $cats = Category::find()->with('products')->all(); //жадный запрос
        return $this->render('show',['cats' => $cats]);


    }
    public function actionShowNew(){
        return $this->render('show-new');
    }

} 