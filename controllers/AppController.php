<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.03.2016
 * Time: 21:15
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller{

    public function debug($arr){
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}