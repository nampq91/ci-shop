<div class="table-responsive">
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th width="3%">#</th>
				<th width="25%">Name</th>
				<th width="15%">Role</th>
				<th width="15%">Photo</th>
				<th width="25%">Info</th>
				<th>Control</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData['list']['data'] as $item) { ?>
				<tr>
					<td><?=$item->id?></td>
					<td><?=$item->name?> ( <?=$item->email?> )</td>
					<td><?=$this->user_model->getRoleById($item->role_id)?></td>
					<td><?=$item->avatar?img($item->avatar , false , ['style' => 'max-height:60px;']):''?></td>
					<td>
						<b>P:</b> <?=$item->phone?><br/>
						<b>A:</b> <?=$item->address?><br/>
						<b>G:</b> <?=$item->gender==1?'Male':'Famale'?><br/>
					</td>
					<td>
						<a href="javascript:void(0);" onclick="return ChangePasswordUserForm(<?=$item->id?> , '<?=$item->name?>')" title="Change Password"><button class="btn btn-xs btn-info"><i class="fa fa-eye"></i> </button></a>
						<a href="javascript:void(0);" onclick="return SetRoleUserForm(<?=$item->id?> , '<?=$item->name?>')" title="Set Role User"><button class="btn btn-xs btn-warning"><i class="fa fa-key"></i> </button></a>
						<a href="javascript:void(0);" onclick="return LoginAsUser(<?=$item->id?>)" title="Login As User"><button class="btn btn-xs btn-info"><i class="fa fa-plug"></i> </button></a>
						<a href="javascript:void(0);" onclick="return UpdateUserStatus(<?=$item->id?>);" title="<?=$item->status>0?'Deactive':'Active'?>" onclick="return confirm('Delete?');">
							<button class="btn btn-xs btn-danger"><i class="fa fa-<?=$item->status>0?'unlock-alt':'unlock'?>"></i> </button>
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="pagination pagination-small pagination-centered pull-right"><?=$getData['list']['pagination']?></div>
<div class="clearfix"></div>

<div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="title_modal"></h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="user_id_change" name="user_id_change" value="">
				<div class="form-group">
					<label for="news_password" class="control-label">New Password:</label>
					<input type="text" class="form-control" id="news_password" name="news_password" value="">
				</div>
				<div class="form-group">
					<label><input id="has_send_email" type="checkbox" name="has_send_email" value="1" checked> Send Password for User via Email</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="return ChangePasswordUser();">Change Password</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="set_role_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="title_modal"></h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="user_id_change" name="user_id_change" value="">
				<div class="form-group" id="set_role_modal_data"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="return SetRoleUser();">Update Role</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	function SetRoleUserForm(user_id , user_name){
		$.post("<?=backend_url('user/get_list_role')?>",{csrf_token_name:csrf_token,fix:Math.random()},function(html){
			$('#title_modal').html('Set Role for User : ' + user_name);
			$('#user_id_change').val(user_id);
			$('#set_role_modal_data').html(html);
			$('#set_role_modal').modal('show');
        });
        return false;
	}

	function ChangePasswordUserForm(user_id , user_name){
		$.post("<?=backend_url('user/get_string')?>",{csrf_token_name:csrf_token,fix:Math.random()},function(html){
			if(html){
				$('#title_modal').html('Change Password for User : ' + user_name);
				$('#user_id_change').val(user_id);
				$('#news_password').val(html);
				$('#change_password_modal').modal('show');
			}
        });
        return false;
	}
	function ChangePasswordUser(){
		var user_id = $('#user_id_change').val();
    	var password = $('#news_password').val();
    	var has_send_email = $("#has_send_email").is(':checked') ? 1 : 0;
		$.post("<?=backend_url('user/reset_passwd')?>",{user_id:user_id,password:password,has_send_email:has_send_email,csrf_token_name:csrf_token,fix:Math.random()},function(html){
			if(html == 'success') { alert('Password Changed!'); $('#change_password_modal').modal('hide'); }
		})
		return false;
	}
	function LoginAsUser(user_id){
        $.post("<?=backend_url('user/login_as')?>",{user_id:user_id,csrf_token_name:csrf_token,fix:Math.random()},function(update){
            if(update == 'success') window.location.href= '<?=backend_url('dashboard')?>';
        });
    	return false;
	}
	function UpdateUserStatus(user_id){
		$.post("<?=backend_url('user/change_status')?>",{user_id:user_id,csrf_token_name:csrf_token,fix:Math.random()},function(update){
            if(update == 'success') {location.reload();}
        });
    	return false;
	}

</script>