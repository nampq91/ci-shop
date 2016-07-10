<div class="table-responsive">
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th style="width:5%;">#</th>
				<th style="width:10%;">Name</th>
				<th style="width:75%;">Permission</th>
				<th style="width:10%;">Control</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData['list']['data'] as $item) { ?>
				<tr>
					<td><?=$item->id?></td>
					<td><strong><?=$item->name?></strong></td>
					<td style="overflow:hidden;"><?=$item->permission?></td>
					<td>
						<a href="<?=backend_url('user/roles_edit/'.$item->id)?>" title="Edit"><button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> </button></a>
						<a href="<?=backend_url('user/roles_permission/'.$item->id)?>" title="Permission"><button class="btn btn-xs btn-warning"><i class="fa fa-wrench"></i> </button></a>
						<a href="<?=backend_url('user/roles_del/'.$item->id)?>" title="Del" onclick="return confirm('Delete?');"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	
<div class="pagination pagination-small pagination-centered pull-right"><?=$getData['list']['pagination']?></div>
<div class="clearfix"></div>