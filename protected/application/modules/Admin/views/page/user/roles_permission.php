<?=form_open()?>
<div class="content" id="p0">
	<div class="info p10">Chọn các quyền hạn cho nhóm quyền bằng cách tích vào các ô tương ứng ở dưới</div>
	<div class="form_bg">
		<?php if($getData['list_role']) { ?>
			<?php foreach ($getData['list_role'] as $key_role => $list_role) { ?>
			<div class="media">
					<div class="media-body">
					<h2 class="media-heading"><?=$key_role?></h2>
					<?php foreach ($list_role as $role) { ?>
						<div class="form-group checkbox">
							<label><input class="<?=$key_role?>" type="checkbox" name="<?=$role['role']?>" value="<?=$role['role']?>" <?=$role['checked']?> > <?=$role['name']?></label>
						</div>
					<?php } ?>
					</div>
			</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<div class="form-group">
	<input type="submit" class="btn btn-danger" value="Submit" name="submit_role">
</div>
<?=form_close()?>