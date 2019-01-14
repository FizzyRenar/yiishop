<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E_shop');
        return $this->render('index',['hits' => $hits]);
    }

    public function actionView($id){
        $this->setPageCannonical();
        $id = Yii::$app->request->get('id');
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,  'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $category = Category::findOne($id);
        if (empty($category)) { // item does not exist
            throw new \yii\web\HttpException(404, 'Такой категории нет');
        }
        $this->setMeta('E_shop | '.$category->name, $category->keywords, $category->description);
        return $this->render('view', [
            'products' => $products,
            'category' => $category,
            'pages' => $pages,
        ]);
    }
}