<?php

namespace app\models;
use yii\base\Model;

class TestForm extends Model
{

    public $name;
    public $email;
    public $text;

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
            [ ['name','email'], 'required'],
            ['email', 'email'],
//            [ 'name', 'string', 'min' => 2], //'tooShort' => 'Мало'
//            [ 'name', 'string', 'max' => 10] //'tooLong' => 'Много'
            ['name', 'string', 'length' => [2,10]],
            ['name' , 'myRule'],
            [ 'text', 'safe']
        ];
    }

    public function myRule($attr){ //своя валидация на сервере
        if(!in_array($this->$attr, ['hello','world'])){
            $this->addError($attr, 'Wrong');
        }
    }
}