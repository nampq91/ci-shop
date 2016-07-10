<?php foreach ($getData['list_category_home'] as $category) { ?>
<div class="col-md-6 col-xs-12 homepage_category_product_0 special-offers">
    <div class="homepage_category_container">
        <h2 class="home-title"> <?=$category->name?>
	        <a class="owl-prev" href="#" onclick="$('#homepage_category_product_<?=$category->id?>').trigger('prev.owl'); return false;"><i class="icon-chevron-left"></i></a>
	        <a class="owl-next" href="#" onclick="$('#homepage_category_product_<?=$category->id?>').trigger('next.owl'); return false;"><i class="icon-chevron-right"></i></a>
        </h2>
        <div class="products_box_wp">
            <ul data-autoplay="true" data-timeout="3000" id="homepage_category_product_<?=$category->id?>" class="product_list grid owl-carousel homepage_category_product">
				<?php foreach ($category->list as $item) { ?>
                <li class="ajax_block_product col-xs-12 col-sm-12 col-md-12">
                    <div class="product-container" itemscope itemtype="http://schema.org/Product">
                        <div class="left-block">
                            <div class="product-image-container">
                                <a class="product_img_link" href="<?=$item->link?>" title="<?=$item->name?>" itemprop="url">
                                    <img class="replace-2x img-responsive fake-image" src="<?=$item->photo?>" alt="<?=$item->name?>" title="<?=$item->name?>" width="271" height="339" itemprop="image" />
                                    <img class="replace-2x img-responsive first-image" src="<?=$item->photo?>" alt="<?=$item->name?>" title="<?=$item->name?>" width="271" height="339" />
                                    <img class="replace-2x img-responsive second-image" src="<?=$item->photo?>" alt="<?=$item->name?>" />
                                </a>
                            </div>
                            <div class="button-container">
                                <div class="functional-buttons-container">
                                    <a class="button ajax_add_to_cart_button btn btn-default" href="javascript:void(0)" rel="nofollow" title="Add to cart" onclick="DatHangSanPham(<?=$item->id?>)"> <span>Add to cart</span> </a>
                                </div>
                            </div>
                        </div>
                        <div class="right-block">
                            <h5 itemprop="name"> <a class="product-name" href="<?=$item->link?>" title="<?=$item->name?>" itemprop="url" > <?=$item->name?> </a></h5>
                            <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span itemprop="price" class="price product-price"> <?=number_format($item->price_promotion)?> VNĐ </span>
                                <span class="price-percent-reduction">-<?=number_format(100 * ($item->price - $item->price_promotion) / $item->price)?>%</span>
                                <meta itemprop="priceCurrency" content="VNĐ" />
                            </div>
                            <a class="new-box" href="<?=$item->link?>"> <span class="new-label">New</span> </a>
                            <div class="product-flags"></div>
                        </div>
                    </div>
                </li>
				<?php } ?>
            </ul>
       	</div>
    </div>
</div>
<?php } ?>