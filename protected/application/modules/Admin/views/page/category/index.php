<div class="table-responsive">
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Photo</th>
				<th>Description</th>
				<th>Control</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData['list']['data'] as $item) { ?>
				<tr>
					<td><?=$item->id?></td>
					<td><?=$item->name?></td>
					<td><?=img($item->photo , false , ['style' => 'max-height:60px;'])?></td>
					<td><?=$item->description?></td>
					<td>
						<a href="<?=backend_url('category/edit/'.$item->id)?>" title="Edit"><button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> </button></a>
						<a href="<?=backend_url('category/delete/.$item->id')?>" title="Del" onclick="return confirm('Delete?');"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	
<div class="pagination pagination-small pagination-centered pull-right"><?=$getData['list']['pagination']?></div>
<div class="clearfix"></div>