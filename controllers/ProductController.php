<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use Yii;

class ProductController extends AppController
{

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E_shop | '.$product->name, $product->keywords, $product->description);
        if (empty($product)) { // item does not exist
            throw new \yii\web\HttpException(404, 'Такого товара нет');
        }
        return $this->render('view', ['product' => $product,'hits' => $hits]);
    }
}