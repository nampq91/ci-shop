<?=$this->load->view('include/page_begin')?>
<body id="product" class="product product-printed-chiffon-dress category-clothing hide-left-column lang_en">
<div id="page">
	<div class="header-container">
		<header id="header" style="z-index:1000;"><?=$this->load->view('module/header')?></header>
	</div>
	<div class="columns-container">
		<div id="columns" class="container">
			<div class="breadcrumb clearfix">
				<a title="Return to Home" href="<?=base_url()?>" class="home"><i class="icon-home"></i>Home</a> <span class="navigation-pipe">/</span>
			</div>
			 <div id="slider_row" class="row">
                <div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
            </div>
            <div class="row">
            	<?=$this->load->view($template)?>
            </div>
		</div>
		<div class="footer-container">
    		<footer class="container" id="footer"><?=$this->load->view('module/footer')?></footer>
    	</div>
	</div>
</div>


<?=$this->load->view('include/page_end')?>