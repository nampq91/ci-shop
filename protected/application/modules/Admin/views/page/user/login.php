<div id="container">
	<form id="form_login" method="post" onsubmit="return doLogin();">
        <input type="hidden" id="<?=$this->security->get_csrf_token_name()?>" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
    	<label for="name">Email đăng nhập:</label>
    	<input type="name" id="txt_username" />
    	<label for="username">Mật khẩu:</label>
    	<input type="password" id="txt_password"/>
        <label for="username">Mã xác nhận:</label> <br />
        <input type="name" id="txt_code" name="code_captcha"/>
        <img id="imgcode" src="<?=backend_url('user/get_captcha')?>" />
    	<div id="lower"><input type="submit" value="Login"/></div>
	</form>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#form_login').find('#txt_username').focus();
})

function doLogin(){
    var email = $('#txt_username').val();
    var password = $('#txt_password').val();
    var captcha = $('#txt_code').val();
    $.post("<?=backend_url('user/captcha')?>",{captcha:captcha,csrf_token_name:csrf_token,fix:Math.random()},function(html){
        if(html == 'ok'){
            $.post("<?=backend_url('user/do_login')?>",{email:email,password:password,csrf_token_name:csrf_token,fix:Math.random()},function(update){
                if(update == 'success')
                    window.location.href= '<?=backend_url('dashboard')?>';
                else{
                    reload_captcha('Tên đăng nhập hoặc mật khẩu không đúng hoặc tài khoản của bạn đang tạm khóa.');
                }
            })
        }else{
            reload_captcha('Mã xác nhận không chính xác');
        }
    })
    return false;
}

function reload_captcha(str){
    if(str) alert(str);
    $('#imgcode').attr('src','<?=backend_url('user/get_captcha')?>?&akey=' + Math.random(1));
    $('#txt_code').val('');
}
</script>