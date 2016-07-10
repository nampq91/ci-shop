<div class="center_column col-xs-12 col-sm-12" id="center_column">
    <div itemtype="http://schema.org/Product" itemscope="">
        <div class="primary_block row">
            <div class="pb-left-column col-xs-12 col-sm-6 col-md-4">
                <img style="max-width:100%;" itemprop="image" title="<?=$getData['info']->name?>" alt="<?=$getData['info']->name?>" src="<?=$getData['info']->photo?>" id="thumb_104" class="img-responsive">
            </div>
            <div class="pb-right-column col-xs-12 col-sm-6 col-md-5">
                <h1 itemprop="name"><?=$getData['info']->name?></h1>
                    <p class="hidden">
                        <input type="hidden" value="9d1e81bc9892f863f14d2995bc640df1" name="token">
                        <input type="hidden" id="product_page_product_id" value="14" name="id_product">
                        <input type="hidden" value="1" name="add">
                        <input type="hidden" value="85" id="idCombination" name="id_product_attribute">
                    </p>
                    <div class="box-info-product">
                        <div class="content_prices clearfix">
                            <div class="price">
                                <p id="old_price" style="display: inline-block;"> <span id="old_price_display" style="display: inline;"><?=number_format($getData['info']->price)?> VNĐ</span></p>
                                <p itemtype="http://schema.org/Offer" itemscope="" itemprop="offers" class="our_price_display">
                                    <link href="http://schema.org/InStock" itemprop="availability">
                                    <span itemprop="price" id="our_price_display"><?=number_format($getData['info']->price_promotion)?> VNĐ</span>
                                    <meta content="VND" itemprop="priceCurrency">
                                </p>
                                <p id="reduction_percent" style="display: block;"><span id="reduction_percent_display">-<?=number_format(100 * ($getData['info']->price - $getData['info']->price_promotion) / $getData['info']->price)?>%</span></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="short_description_block">
                            <div itemprop="description" class="rte align_justify" id="short_description_content"><p><?=$getData['info']->description?></p></div>
                        </div>
                        <div class="box-cart-bottom">
                            <ul class="clearfix no-print" id="usefull_link_block">
                                <li><button class="exclusive" onclick="DatHangSanPham(<?=$getData['info']->id?>)"> <span>Add to cart</span> </button></li>
                            </ul>
                        </div>
                        <p class="socialsharing_product list-inline no-print">
                            <button class="btn btn-default btn-twitter" type="button"> <i class="icon-twitter"></i> Tweet </button>
                            <button class="btn btn-default btn-facebook" type="button"> <i class="icon-facebook"></i> Share </button>
                            <button class="btn btn-default btn-google-plus" type="button"> <i class="icon-google-plus"></i> Google+ </button>
                            <button class="btn btn-default btn-pinterest" type="button"> <i class="icon-pinterest"></i> Pinterest </button>
                        </p>
                    </div>
            </div>
        </div>
        <div id="more_info_block">
            <div class="sheets align_justify" id="more_info_sheets">
                <div class="rte" id="idTab1"><?=$getData['info']->content?></div>
                <div id="idTab5" class="block_hidden_only_for_screen">
                    <div id="product_comments_block_tab">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                        var disqus_shortname = '<?=$website_info['disqus_shortname']?>';</script>
                        <script type="text/javascript" src="//<?=$website_info['disqus_shortname']?>.disqus.com/embed.js"></script>
                        <noscript>Please enable JavaScript to view content</noscript>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-product-box blockproductscategory">
            <?=$this->load->view('module/home/top_hot')?>
        </section>
    </div>
</div>