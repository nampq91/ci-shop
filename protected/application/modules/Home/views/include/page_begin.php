<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
<!--[if gt IE 8]><html class="no-js ie9" lang="en"><![endif]-->
<html lang="vi" class="no-js" itemscope itemtype="http://schema.org/Product">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="Content-Language" content="vi" />
<title><?=$website_info['title']?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="canonical" href="<?=base_url(uri_string())?>">
<meta name="title" class="title-base" content="<?=$website_info['title']?>" />
<meta name="description" content="<?=$website_info['description']?>" />
<meta name="keywords" content="<?=$website_info['keyword']?>" />
<meta name="google-site-verification" content="<?=$website_info['google_wmt']?>" />
<link type="image/x-icon" rel="icon" href="<?=$website_info['favicon']?>">
<link rel="shortcut icon" href="<?=$website_info['favicon']?>" />
<link rel="icon" type="image/png" href="<?=$website_info['favicon']?>" />
<meta name="LANGUAGE" content="vi" />
<meta name="AUTHOR" content="<?=$website_info['author_name']?>" />
<link rel="author" href="<?=base_url('humans.txt')?>" />
<link rel="publisher" href="<?=$website_info['author_link']?>"/>
<base href="<?=base_url()?>" /><!--[if IE]></base><![endif]-->

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?=$website_info['title']?>">
<meta property="headline" content="<?=$website_info['title']?>"/>
<meta itemprop="description" content="<?=$website_info['description']?>">
<meta itemprop="image" content="<?=$website_info['images']?>">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?=$website_info['twitter_page']?>">
<meta name="twitter:title" content="<?=$website_info['title']?>">
<meta name="twitter:description" content="<?=$website_info['description']?>">
<meta name="twitter:creator" content="<?=$website_info['twitter_user']?>">
<meta name="twitter:image:src" content="<?=$website_info['images']?>">

<!-- Open Graph data -->
<meta property="og:locale" content="vi_VN"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="<?=$website_info['title']?>"/>
<meta property="og:headline" content="<?=$website_info['title']?>"/>
<meta property="og:description" content="<?=$website_info['description']?>"/>
<meta property="og:url" content="<?=base_url(uri_string())?>"/>
<meta property="og:site_name" content="<?=$website_info['site_name']?>"/>
<meta property="article:publisher" content="<?=$website_info['author_link']?>"/>
<meta property="article:author" content="<?=$website_info['author_name']?>"/>
<meta property="fb:app_id" content="<?=$website_info['facebook_app_id']?>"/>
<meta property="og:image" content="<?=$website_info['images']?>" />
<meta name="generator" content="Powered by CodeIgniter - Designed & Developed by Luu Thi Hong Minh."/>
<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<?= $extraHeaderCSS ?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?= $extraHeader ?>
<?= $extraHeaderJS ?>
<?= $extraFooterJS ?>

<script type="text/javascript">
    /* <![CDATA[ */ ;
    var CUSTOMIZE_TEXTFIELD = 1;
    var FancyboxI18nClose = 'Close';
    var FancyboxI18nNext = 'Next';
    var FancyboxI18nPrev = 'Previous';
    var added_to_wishlist = 'Added to your wishlist.';
    var ajax_allowed = true;
    var ajaxsearch = true;
    var baseDir = '<?=BASE_URL?>';
    var baseUri = '<?=BASE_URL?>';
    var comparator_max_item = 3;
    var comparedProductsIds = [];
    var contentOnly = false;
    var customizationIdMessage = 'Customization #';
    var delete_txt = 'Delete';
    var displayList = false;
    var freeProductTranslation = 'Free!';
    var freeShippingTranslation = 'Free shipping!';
    var generated_date = 1426782450;
    var id_lang = 1;
    var img_dir = 'http://mela.greenwebcorp.com/layout1/themes/mela/img/';
    var instantsearch = false;
    var isGuest = 0;
    var isLogged = 0;
    var loggin_required = 'You must be logged in to manage your wishlist.';
    var max_item = 'You cannot add more than 3 product(s) to the product comparison';
    var min_item = 'Please select at least one product';
    var mywishlist_url = 'login.html';
    var page_name = 'index';
    var priceDisplayMethod = 1;
    var priceDisplayPrecision = 2;
    var quickView = true;
    var removingLinkText = 'remove this product from my cart';
    var roundMode = 2;
    var static_token = '9d1e81bc9892f863f14d2995bc640df1';
    var token = 'f26d65a354cae57522390c1f56696b7c';
    var usingSecureMode = false;
    var wishlistProductsIds = false; /* ]]> */
</script>
<script type="text/javascript">
    /* <![CDATA[ */ ;
    $(document).ready(function() {
        $('body').addClass('fullwidth-slider');
        $('#sequence').height($('#sequence').width() * 0.5);
        var options = {
            nextButton: true,
            prevButton: true,
            pagination: true,
            animateStartingFrameIn: true,
            autoPlay: true,
            autoPlayDelay: 3000,
        };
        var mySequence = $("#sequence").sequence(options).data("sequence");
    });
    $(window).load(function() {
        $('#sequence').height($('#sequence').width() * 0.5);
    });
    $(window).resize(function() {
        $('#sequence').height($('#sequence').width() * 0.5);
    }); /* ]]> */
</script>
<style type="text/css">
    .slide-item-1 {
        background-color: ;
    }
    
    .slide-item-2 {
        background-color: ;
    }
    
    .slide-item-3 {
        background-color: ;
    }
</style>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />

</head>