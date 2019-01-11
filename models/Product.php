<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11.01.2019
 * Time: 11:50
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

 /*   public function getCategories(){
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }*/

}