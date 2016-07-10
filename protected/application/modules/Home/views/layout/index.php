<?=$this->load->view('include/page_begin')?>
<body id="index" class="index hide-left-column lang_en">
<div id="page">
	<div class="header-container">
		<header id="header" style="z-index:1000;"><?=$this->load->view('module/header')?></header>
	</div>
	<div class="columns-container">
		<div id="slider_row_fullwidth">
			<div id="fullwidthslider"><?=$this->load->view('module/slider')?></div>
		</div>
		<div id="columns" class="container">
			 <div id="slider_row" class="row">
                <div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
            </div>
            <div class="row">
            	<div id="center_column" class="center_column col-xs-12 col-sm-12">
            		<div id="gwperfectproduct" class="row"><?=$this->load->view('module/home/top_hot')?></div>
            		<?=$this->load->view('module/home/list_home')?>
            		<div class="clearfix"><?=$this->load->view('module/home/ads_sale')?></div>
            		<div class="row" id="gw_product_carousel"><?=$this->load->view('module/home/category')?></div>
            	</div>
            </div>
		</div>
		<div class="footer-container">
    		<footer class="container" id="footer"><?=$this->load->view('module/footer')?></footer>
    	</div>
	</div>
</div>


<?=$this->load->view('include/page_end')?>