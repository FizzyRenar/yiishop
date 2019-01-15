<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Фото</th>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item):?>
            <tr>
                <td><?=Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'width' => '110']);?></td>
                <td><a href="<?=Url::to(['product/view', 'id' => $item['id']]);?>"><?= $item['name']?></a></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
                <td><?= $item['qty'] * $item['price']?></td>
            </tr>
        <?php endforeach?>
        <tr>
            <td colspan="5">Итого: </td>
            <td><?= $session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="5">На сумму: </td>
            <td><?= $session['cart.sum']?></td>
        </tr>
        </tbody>
    </table>
</div>