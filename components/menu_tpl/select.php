<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordian" href="#<?=mb_strtolower($category['name'])?>">
                <?if(isset($category['childs'])):?>
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                <?endif;?>
                <?=$category['name']?>
            </a>
        </h4>
    </div>
    <?if(isset($category['childs'])):?>
        <div id="<?=mb_strtolower($category['name'])?>" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>
                    <?= $this->getMenuHtml($category['childs'])?>
                    <!-- <li><a href="#">Nike </a></li>
                     <li><a href="#">Under Armour </a></li>
                     <li><a href="#">Adidas </a></li>
                     <li><a href="#">Puma</a></li>
                     <li><a href="#">ASICS </a></li>-->
                </ul>
            </div>
        </div>
    <?endif;?>
</div>