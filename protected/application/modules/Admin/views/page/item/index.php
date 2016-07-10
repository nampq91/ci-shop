<div class="table-responsive">
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th>#</th>
				<th>Category</th>
				<th>Name</th>
				<th>Photo</th>
				<th>Description</th>
				<th>Price</th>
				<th>Views</th>
				<th>Control</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData['list']['data'] as $item) { ?>
				<tr>
					<td><?=$item->id?></td>
					<td><?=$this->shop_category->getCategoryName($item->cat_id)?></td>
					<td><?=$item->name?></td>
					<td><?=img($item->photo , false , ['style' => 'max-height:60px;'])?></td>
					<td><?=$item->description?></td>
					<td>
						Giá gốc: <?=number_format($item->price)?> VNĐ<br>
						Giá bán: <?=number_format($item->price_promotion)?> VNĐ
					</td>
					<td><?=$item->view_total?></td>
					<td>
						<a href="<?=backend_url('item/edit/'.$item->id)?>" title="Edit"><button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> </button></a>
						<a href="<?=backend_url('item/delete/.$item->id')?>" title="Del" onclick="return confirm('Delete?');"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	
<div class="pagination pagination-small pagination-centered pull-right"><?=$getData['list']['pagination']?></div>
<div class="clearfix"></div>