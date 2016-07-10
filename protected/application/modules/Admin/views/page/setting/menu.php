<div class="page-tables">
	<h4><span class="label label-success" data-toggle="modal" data-target=".form-slider-bs">Thêm mới</span></h4>
	<div class="modal fade form-slider-bs" tabindex="-1" role="dialog" aria-labelledby="SliderForm" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="padding:20px;"><?=$getData['form']?></div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-bordered ">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Link</th>
					<th>Control</th>
				</tr>
			</thead>
			<tbody>
				<?php if($getData['list']){ $dem=1; foreach ($getData['list'] as $item) { ?>
					<tr>
						<td><?=$dem?></td>
						<td><?=$item['name']?></td>
						<td><?=$item['link']?></td>
						<td>
							<a href="javascript:void(0);" title="Del" onclick="return DelelteMenu('<?=$item['rank']?>');"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
						</td>
					</tr>
				<?php $dem++; } } ?>
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>
	<script>
	function error_message(text){
		alert(text);
		return false;
	}
	function MenuSubmit(){
	    var name = $('#name').val();
	    if(!name) return error_message('Vui lòng nhập tên menu')
	    var rank = $('#rank').val();
	    var link = $('#link').val();
	    $.post("<?=backend_url('setting/menu_submit')?>",{name:name,rank:rank,link:link,fix:Math.random()},function(html){
            if(html == 'done')
                window.location.href= '<?=backend_url('setting/menu')?>';
            else{
                return error_message('Có lỗi khi cập nhật dữ liệu.');
            }
        });
        return false;
    }
    function DelelteMenu(menu_id){
	    $.post("<?=backend_url('setting/menu_delete')?>",{menu_id:menu_id,fix:Math.random()},function(html){
            if(html == 'done')
                window.location.href= '<?=backend_url('setting/menu')?>';
            else{
                return error_message('Có lỗi khi cập nhật dữ liệu.');
            }
        });
        return false;
    }
	</script>

</div>