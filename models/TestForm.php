<?php

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;


class TestForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст сообщения',
        ];
    }

    public function rules()
    {
        return [
            [ ['name','text'], 'required'],
            ['email', 'email'],
//            [ 'name', 'string', 'min' => 2], //'tooShort' => 'Мало'
//            [ 'name', 'string', 'max' => 10] //'tooLong' => 'Много'
//            ['name', 'string', 'length' => [2,10]],
//            ['name' , 'myRule'],

        ];
    }

   /* public function myRule($attr){ //своя валидация на сервере
        if(!in_array($this->$attr, ['hello','world'])){
            $this->addError($attr, 'Wrong');
        }
    }*/
}