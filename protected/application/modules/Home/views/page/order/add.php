<table class="table table-hover table-bordered ">
    <thead>
        <tr>
            <th>Sản Phẩm</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Giá Tiền</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="<?=$getData['info']->photo?>" style="max-height:80px;" ></td>
            <td><?=$getData['info']->name?></td>
            <td><?=$getData['info']->description?></td>
            <td><?=number_format($getData['info']->price_promotion)?> VNĐ</td>
            <td>
                <select class="form-control" id="soluong_sp" name="soluong_sp">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <input type="hidden" id="so_tien_ban_dau" value="<?=$getData['info']->price_promotion?>">
                <input type="hidden" id="soluong_sp_duoc_chon" value="1" name="soluong_sp_duoc_chon">
            </td>
            <td id="tong_sotien"><?=number_format($getData['info']->price_promotion)?> VNĐ</td>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
    $('#soluong_sp').on('change', function() {
        var so_tien_ban_dau = $("#so_tien_ban_dau").val();
        $('#soluong_sp_duoc_chon').val(this.value);
        var tong_sotien = this.value * so_tien_ban_dau;
        $('#tong_sotien').html(formatNumber(tong_sotien) + ' VNĐ');
    });
</script>