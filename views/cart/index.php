<? use app\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;

if(!empty($session['cart'])):
?>

<section id="cart_items">
    <div class="container">
        <!--<div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>-->
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?foreach($session['cart'] as $id => $item):?>
                <tr>
                    <td class="cart_product">
                        <a href="<?=Url::to(['product/view', 'id' => $item['id']]);?>">
                            <?=Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'width' => '110']);?>
                        </a>
                    </td>
                    <td class="cart_description">
                        <h5><a href="<?=Url::to(['product/view', 'id' => $item['id']]);?>"><?=$item['name']?></a></h5>
                    </td>
                    <td class="cart_price">
                        <p>$<?=$item['price']?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href=""> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="<?=$item['qty']?>" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href=""> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">$<?=$item['price']?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
             <?endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Quanity <span><?=$session['cart.qty']?></span></li>
                        <li>Summ <span>$<?=$session['cart.sum']?></span></li>
                    </ul>
                    <button class="btn btn-default" onClick="cleanCart()">Очистить корзину</button>
                    <a class="btn btn-success" href="">Оформить заказ</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<?else:?>
    <h3>Корзина пуста</h3>
<?endif;?>
