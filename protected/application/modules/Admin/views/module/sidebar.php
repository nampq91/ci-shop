<div class="sidey">
	<div class="logo">
		<h1><a href="<?=backend_url()?>"><i class="fa fa-desktop br-red"></i>ADMIN</a>CP</h1>
	</div>

	<div class="sidebar-dropdown"><a href="#" class="br-red"><i class="fa fa-bars"></i></a></div>
	<div class="side-nav">
		<div class="side-nav-block">
			<ul class="list-unstyled">
				<?php foreach ($getData['admin_menu'] as $category => $list) { ?>
					<li class="has_submenu">
						<a href="#"><i class="fa fa-file"></i><?=ucfirst($category)?><span class="nav-caret fa fa-caret-down <?=$category?>"></span></a>
						<ul class="list-unstyled">
							<?php foreach ($list as $item) { ?>
							<li><a href="<?=$item['link']?>" title="<?=$item['name']?>"><i class="fa fa-angle-double-right"></i><?=$item['name']?></a></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>