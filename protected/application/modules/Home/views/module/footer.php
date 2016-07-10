<div class="row">
    <section id="block_various_links_footer" class="footer-block col-xs-12 col-sm-3">
        <h4>Information</h4>
        <ul class="toggle-footer" style="">
            <li class="item"> <a title="Our stores" href="#"> Our stores </a></li>
            <li class="item"> <a title="Contact us" href="#"> Contact us </a></li>
            <li class="item"> <a title="Terms and conditions of use" href="#"> Terms and conditions of use </a></li>
            <li class="item"> <a title="About us" href="#"> About us </a></li>
            <li> <a title="Sitemap" href="#"> Sitemap </a></li>
        </ul>
    </section>
    <div class="footer-block col-xs-12 col-sm-3" id="links_block_footer1">
        <h4 class="title_block"> Danh mục</h4>
        <ul class="toggle-footer" style="">
            <?php foreach ($getData['category'] as $category) { ?>
                <li><a title="<?=$category->name?>" href="<?=$category->link?>"><?=$category->name?></a></li>    
            <?php } ?>
        </ul>
    </div>
    <section class="footer-block col-xs-12 col-sm-6" id="block_contact_infos">
        <div>
            <h4>Store Information</h4>
            <ul class="toggle-footer" style="">
                <li> <i class="icon-map-marker"></i><?=$website_info['site_address']?></li>
                <li> <i class="icon-phone"></i>Call us now: <span><?=$website_info['site_phone']?></span></li>
                <li> <i class="icon-envelope-alt"></i>Email: <span><a href="mailto:<?=$website_info['site_email']?>"><?=$website_info['site_email']?></a></span></li>
            </ul>
        </div>
    </section>
    <section id="block_copyright">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <p>COPYRIGHT &copy; 2015 <a target="_blank" href="#">Lưu Thị Hồng Minh</a>. ALL RIGHTS RESERVED</p>
            </div>
            <div class="col-md-6 col-xs-12"> <img alt="" src="<?=base_url('uploads/default/payment.jpg')?>"></div>
        </div>
    </section>
</div>