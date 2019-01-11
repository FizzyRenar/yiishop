
<? $this->beginBlock('block');?>
<h1>Заголовок страницы</h1>
<? $this->endBlock();?>
<h1>Show Action</h1>

<button class="btn btn-success" id="btn">Click me...</button>

<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>
<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>

<?php //$this->registerCss('.container{background: #ccc;}') ?>
<ul>
<?foreach($cats as $cat){
    echo '<li>'.$cat->title.'</li>';
    $products = $cat->products;
    echo '<ul>';
    foreach($products as $product){
        echo '<li>'.$product->title.'</li>';
    }
    echo '</ul>';
}?>
</ul>
<?//='<pre>'.print_r($cats,true).'</pre>'?>
<?//=count($cats[0]->products)?>
<?php

$js = <<<JS
    $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: '123'},
            type: 'POST',
            success: function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);