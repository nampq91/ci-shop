<div class="banner">
    <div class="container">
        <div class="row"></div>
    </div>
</div>
<div class="nav">
    <div class="container">
        <div class="row"> <a id="mmenu-btn" href="#mmenu"><i class="icon-reorder"></i>Menu</a>
            <nav>
                <?php if($getData['user_info']){ ?>
                <div id="currencies-block-top">
                    <a href="#" data-toggle="dropdown" id="profile">
                        <img src="<?=$getData['user_info']->avatar?>" alt="<?=$getData['user_info']->name?>" class="img-responsive img-circle" style="max-width:80px;" />
                        <?=$getData['user_info']->name?>
                    </a>
                    <a href="<?=backend_url('user/logout')?>">Sign Out</a>
                </div>
                <?php }else{ ?>
                <div id="currencies-block-top">
                    <a href="javascript:void(0);" onclick="Form_Register();"><strong>Đăng kí</strong></a>
                </div>
                <div id="currencies-block-top">
                    <a href="javascript:void(0);" onclick="Form_Login();"><strong>Đăng nhập</strong></a>
                </div>
                <?php } ?>
                
                <div id="contact-link">
                    <a href="mailto:<?=$website_info['site_email']?>" title="Contact Us"><i class="icon-envelope"></i>Contact us</a>
                </div>
                <span class="shop-phone"> <i class="icon-phone"></i>Call us now: <strong><?=$website_info['site_phone']?></strong> </span>
            </nav>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div id="header-main">
            <div id="header_logo">
                <a href="<?=base_url()?>" title="<?=$website_info['logo_title']?>"><img class="logo img-responsive" src="<?=$website_info['logo']?>" alt="<?=$website_info['logo_title']?>" width="230" height="98" /> </a>
            </div>
            <div id="mmenu" class="gw_mmenu">
                <ul>
                <?php foreach ($getData['menu'] as $menu) { ?>
                    <li class="menu_item_<?=$menu['rank']?>">
                        <a href="<?=$menu['link']?>" title="<?=$menu['name']?>"><span><?=$menu['name']?></span></a>
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div id="menu" class="gw_megamenu hidden-xs">
                <ul>
                <?php foreach ($getData['menu'] as $menu) { ?>
                    <li class="firstLevel menu_item_<?=$menu['rank']?>">
                        <a href="<?=$menu['link']?>" title="<?=$menu['name']?>"><span><?=$menu['name']?></span></a>
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div class="shopping_cart">
                <a href="javascript:void(0);" title="Xem giỏ hàng" rel="nofollow" onclick="ChiTietDonHang();">Giỏ hàng</a>
            </div>
            <div id="gwsearchbycate" class="clearfix">
                <form method="get" action="<?=base_url('search')?>" id="searchbox">
                    <p class="search_box">
                        <label for="search_query_top"></label>
                        <input class="search_query" placeholder="Search" type="text" id="search_query_top" name="search_query" value="" />
                        <button type="submit"><i class="icon-search"></i></button>
                    </p>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>