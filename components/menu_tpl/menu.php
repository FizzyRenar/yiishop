
    <li>
        <a href="<?=\yii\helpers\Url::to(['category/view','id'=> $category['id']])?>">
            <?=$category['name']?>
            <?if(isset($category['childs'])):?>
                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
            <?endif;?>

        </a>
        <?if(isset($category['childs'])):?>
            <ul>
                <?= $this->getMenuHtml($category['childs'])?>
            </ul>
        <?endif;?>
    </li>

