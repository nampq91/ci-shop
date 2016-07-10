<?=$this->load->view('include/page_begin')?>
<div class="outer">
	<div class="sidebar"><?=$this->load->view('module/sidebar')?></div>
	<div class="mainbar">
		<div class="main-head"><?=$this->load->view('module/header')?></div>
		<div class="main-content"><?=$this->load->view('module/main')?></div>
		<div class="clearfix"></div>
	</div>
</div>
<?=$this->load->view('include/page_end')?>
