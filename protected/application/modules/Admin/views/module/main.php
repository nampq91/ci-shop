<div class="container">
	<?php if($this->session->flashdata('message')){ ?>
	<div class="alert alert-success">
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	    <strong>Success!</strong><?=$this->session->flashdata('message')?>
	</div>
	<?php } ?>
	<div class="page-content">
		<?=$this->load->view($template)?>
	</div>
</div>