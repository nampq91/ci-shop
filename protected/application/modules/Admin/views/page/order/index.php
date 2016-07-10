<div class="table-responsive">
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th>#</th>
				<th>Fullname</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Note</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData['list']['data'] as $item) { ?>
				<tr onclick="toggle_visibility('order_info_<?=$item->id?>');">
					<td><?=$item->id?></td>
					<td><?=$item->fullname?></td>
					<td><?=$item->email?></td>
					<td><?=$item->phone?></td>
					<td><?=$item->address?></td>
					<td><?=$item->note?></td>
					<td><?=date('H:i d/m/Y' , $item->created)?></td>
				</tr>
				<tr id="order_info_<?=$item->id?>" style="display:none;">
					<td colspan="7">
						<table class="table table-hover table-bordered ">
						    <thead>
						        <tr>
						            <th>Id</th>
						            <th>Sản Phẩm</th>
						            <th>Tên</th>
						            <th>Giá Tiền</th>
						            <th>Số lượng</th>
						            <th>Tổng tiền</th>
						        </tr>
						    </thead>
						    <tbody>
						    	<?php
						    		$tongtien = 0; $dem = 1;
						    		foreach ($this->shop_order_info->getOrder($item->id) as $detail) {
						    			$dem ++;
						    			$tongtien += $detail->price * $detail->total;
						    	?>
						    	<tr>
						            <td><?=$dem?></td>
						            <td><img src="<?=$detail->photo?>" style="max-height:50px;" ></td>
						            <td><?=$detail->name?></td>
						            <td><?=number_format($detail->price)?> VNĐ</td>
						            <td><?=$detail->total?></td>
						            <td><?=number_format($detail->price * $detail->total)?> VNĐ</td>
						        </tr>
						    	<?php } ?>
						    </tbody>
						    <tbody>
						        <tr>
						            <td colspan="5">Thành tiền</td>
						            <td colspan="2"><?=number_format($tongtien)?> VNĐ</td>
						        </tr>
						    </tbody>
						</table>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>
<div class="pagination pagination-small pagination-centered pull-right"><?=$getData['list']['pagination']?></div>
<div class="clearfix"></div>