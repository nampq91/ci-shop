<table class="table table-hover table-bordered ">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản Phẩm</th>
            <th>Tên</th>
            <th>Giá Tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    	<?php
    		$tongtien = 0; $dem = 1;
    		foreach ($getData['data'] as $item) {
    			$dem ++;
    			$tongtien += $item->price_promotion * $item->total;
    	?>
    	<tr>
            <td><?=$dem?></td>
            <td><img src="<?=$item->photo?>" style="max-height:50px;" ></td>
            <td><?=$item->name?></td>
            <td><?=number_format($item->price_promotion)?> VNĐ</td>
            <td><?=$item->total?></td>
            <td><?=number_format($item->price_promotion * $item->total)?> VNĐ</td>
            <td><a href="javascript:void(0);" onclick="XoaKhoiDongDatHang(<?=$item->id?>)">Xóa</a></td>
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