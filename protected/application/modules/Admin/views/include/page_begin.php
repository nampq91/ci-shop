<!doctype html>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= $extraHeaderCSS ?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?= $extraHeader ?>
<?= $extraHeaderJS ?>
<?= $extraFooterJS ?>
</head>
<body>
