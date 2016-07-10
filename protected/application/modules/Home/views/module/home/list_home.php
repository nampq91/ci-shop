<ul id="home-page-tabs" class="nav nav-tabs clearfix">
    <li>
        <a data-toggle="tab" href="#blocknewproducts" class="blocknewproducts">Hàng mới về</a>
        <a class="owl-prev" href="#" onclick="$('#blocknewproducts').trigger('prev.owl'); return false;"><i class="icon-chevron-left"></i></a>
        <a class="owl-next" href="#" onclick="$('#blocknewproducts').trigger('next.owl'); return false;"><i class="icon-chevron-right"></i></a>
    </li>
    <li>
        <a data-toggle="tab" href="#homefeatured" class="homefeatured">Khuyến mãi xuân hè</a>
        <a class="owl-prev" href="#" onclick="$('#homefeatured').trigger('prev.owl'); return false;"><i class="icon-chevron-left"></i></a>
        <a class="owl-next" href="#" onclick="$('#homefeatured').trigger('next.owl'); return false;"><i class="icon-chevron-right"></i></a>
    </li>
    <li>
        <a data-toggle="tab" href="#blockbestsellers" class="blockbestsellers">Bán chạy nhất</a>
        <a class="owl-prev" href="#" onclick="$('#blockbestsellers').trigger('prev.owl'); return false;"><i class="icon-chevron-left"></i></a>
        <a class="owl-next" href="#" onclick="$('#blockbestsellers').trigger('next.owl'); return false;"><i class="icon-chevron-right"></i></a>
    </li>
</ul>

<div class="tab-content">
    <ul data-autoplay="false" id="blocknewproducts" class="product_list grid owl-carousel blocknewproducts tab-pane">
        <?php foreach ($getData['top_news'] as $item) { ?>
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
                        <h5 itemprop="name"> <a class="product-name" href="<?=$item->link?>" title="<?=$item->name?>" itemprop="url" ><?=$item->name?></a></h5>
                        <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <span itemprop="price" class="price product-price"><?=number_format($item->price_promotion)?> VNĐ</span>
                            <span class="old-price product-price"><?=number_format($item->price)?> VNĐ</span>
                            <span class="price-percent-reduction">-<?=number_format(100 * ($item->price - $item->price_promotion) / $item->price)?>%</span>
                            <meta itemprop="priceCurrency" content="VNĐ" />
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <ul data-autoplay="false" id="homefeatured" class="product_list grid owl-carousel homefeatured tab-pane">
        <?php foreach ($getData['top_sale'] as $item) { ?>
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
                        <h5 itemprop="name"> <a class="product-name" href="<?=$item->link?>" title="<?=$item->name?>" itemprop="url" ><?=$item->name?></a></h5>
                        <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <span itemprop="price" class="price product-price"><?=number_format($item->price_promotion)?> VNĐ</span>
                            <span class="old-price product-price"><?=number_format($item->price)?> VNĐ</span>
                            <span class="price-percent-reduction">-<?=number_format(100 * ($item->price - $item->price_promotion) / $item->price)?>%</span>
                            <meta itemprop="priceCurrency" content="VNĐ" />
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <ul data-autoplay="false" id="blockbestsellers" class="product_list grid owl-carousel blockbestsellers tab-pane">
        <?php foreach ($getData['top_inday'] as $item) { ?>
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
                        <h5 itemprop="name"> <a class="product-name" href="<?=$item->link?>" title="<?=$item->name?>" itemprop="url" ><?=$item->name?></a></h5>
                        <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <span itemprop="price" class="price product-price"><?=number_format($item->price_promotion)?> VNĐ</span>
                            <span class="old-price product-price"><?=number_format($item->price)?> VNĐ</span>
                            <span class="price-percent-reduction">-<?=number_format(100 * ($item->price - $item->price_promotion) / $item->price)?>%</span>
                            <meta itemprop="priceCurrency" content="VNĐ" />
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>