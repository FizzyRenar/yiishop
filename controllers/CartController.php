<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.01.2019
 * Time: 14:26
 */

namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use app\models\OrderItems;
use app\models\Order;

use Yii;

class CartController extends AppController
{
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product,$qty);

        if(!Yii::$app->request->isAjax)
//            return $this->render('index',['session' => $session]);
        return $this->redirect(Yii::$app->request->referrer); //асинхронно
//
        $this->layout = false;
        return $this->render('cart-modal',['session' => $session]);
    }

    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal',['session' => $session]);

    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal',['session' => $session]);

    }

    public function actionShow(){
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal',['session' => $session]);
    }

    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if($order->load(Yii::$app->request->post())){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save()){
                $this->saveOrderItems($session['cart'],$order->id);
                Yii::$app->session->setFlash('success','Ваш заказ принят. Менеджер свяжется с Вами');
                Yii::$app->mailer->compose('order', ['session' => $session])
                ->setFrom([Yii::$app->params['adminEmail'] => 'yiishop'])
                ->setTo($order->email)
                ->setSubject('Order')
                ->send();

                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка оформления заказа');
            }
        }
        return $this->render('view',['session' => $session,'order' => $order]);
    }

    protected function  saveOrderItems($items,$order_id){
        foreach($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();

        }
    }
}