<ul class="product_list row grid">
    <?php $dem = 0; foreach ($getData['list']['data'] as $item) { ?>
    <li class="ajax_block_product col-xs-6 col-xs-12 col-sm-6 col-md-4">
        <div class="product-container">            
            <div class="left-block">
                <div class="product-image-container">
                    <a itemprop="url" title="<?=$item->name?>" href="#" class="product_img_link">
                        <img itemprop="image" title="<?=$item->name?>" alt="<?=$item->name?>" src="<?=$item->photo?>" class="replace-2x img-responsive fake-image">
                        <img title="<?=$item->name?>" alt="<?=$item->name?>" src="<?=$item->photo?>" class="replace-2x img-responsive first-image">
                        <img alt="<?=$item->name?>" src="<?=$item->photo?>" class="replace-2x img-responsive second-image">
                    </a>
                </div>
            </div>
            <div class="right-block">
                <h5 itemprop="name"><a itemprop="url" title="<?=$item->name?>" href="#" class="product-name"><?=$item->name?></a></h5>
                <div itemtype="http://schema.org/Offer" itemscope="" itemprop="offers" class="content_price">
                    <span class="price product-price" itemprop="price"> <?=number_format($item->price_promotion)?> VNĐ </span>
                    <meta content="USD" itemprop="priceCurrency">
                </div>
            </div>
        </div>
    </li>
    <?php $dem++; } ?>
</ul>