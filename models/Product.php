<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.01.2019
 * Time: 16:21
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }
}