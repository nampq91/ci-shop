<?php defined('BASEPATH') || exit('No direct script access allowed');

class User extends MY_Controller_Backend {

	protected $captcha_login = '';

	function __construct(){
        parent::__construct();
        $this->captcha_login = md5('login_website_'.BASE_URL);
    }

    public function index(){
		$this->website_info['title'] = 'Danh sách người dùng';
		$this->setData['list'] = $this->user_model->getData();
		return $this->view_layout();
    }



	function logout(){
        $session_data['user_info'] = [];
        $this->session->set_userdata($session_data);
		redirect(base_url('/'));
	}

	function login(){
		if($this->user_model->has_login() ){
			redirect(backend_url());
		}
		$this->layout = 'login';
		$this->load_css_style('css/login.css');
		$this->website_info['title'] = 'Đăng nhập vào hệ thống';
		return $this->view_layout();
	}

	function login_as(){
		$user_id = $_POST['user_id'];
		if($this->check_login_as_permission($user_id)){
			$user_info = $this->user_model->where('id',$user_id)->where('status >','0')->get_first();
	        if($user_info){
	        	$session_data['user_login_as'] = $this->session->userdata('uid');
	            $session_data['user_info'] = $user_info;
	            $session_data['uid'] = $user_info->id;
	            $session_data['username'] = $user_info->email;
	            $this->session->set_userdata($session_data);
	            echo 'success';
	        }
	    }
	}

	function check_login_as_permission($user_id){
		// kiểm tra quyền Login As
		if($user_id != $this->session->userdata('uid')){
			return true;
		}
		return false;
	}

	function change_status(){
		$user_id = $_POST('user_id');
		$user_info = $this->user_model->where('id',$user_id)->get_first();
        if($user_info){
        	$status = $user_info->status > 0 ? -1 : 1;
        	$this->user_model->update(['status' => $status] , ['id' => $user_id]);
            echo 'success';
        }
	}

	function logout_as(){
		$user_id = $this->session->userdata('user_login_as');
		$user_info = $this->user_model->where('id',$user_id)->where('status >','0')->get_first();
        if($user_info){
        	$session_data['user_login_as'] = 0;
            $session_data['user_info'] = $user_info;
            $session_data['uid'] = $user_info->id;
            $session_data['username'] = $user_info->email;
            $this->session->set_userdata($session_data);
        }
        redirect(backend_url('user/'));
	}

	function do_login(){
		$email = $_POST["email"];
		$password = $_POST["password"];
		if($email && $password){
			if($this->user_model->login($email , $password)) echo 'success';
		}
	}

	function reset_passwd(){
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];
		if($this->user_model->change_pass($user_id , $password) ){
			$has_send_email = $_POST['has_send_email'];
			if($has_send_email){

			}
			echo 'success';
		}

	}

	function get_captcha(){
	    echo show_captcha('captcha_login');
	}

	function get_string(){
		echo get_random_str();
	}

	function captcha(){
		$CFG =& load_class('Config', 'core');
    	$CFG->set_item('csrf_protection', FALSE);

	    $captcha = md5($_POST["captcha"]);
	    $active_captcha = $this->session->userdata('captcha_login');
	    echo ($captcha == $active_captcha) ? 'ok' : '';
	}

	function profile(){
		$this->website_info['title'] = 'Edit Profile';
		$this->setData['form'] = $this->user_model->update_profile();
		return $this->view_layout('edit');
	}

	/* Phân quyền hệ thống */
	public function roles(){
		$this->website_info['title'] = 'Danh sách quyền người dùng';
		$this->user_model->_table = 'user_roles';
		$this->setData['list'] = $this->user_model->getData();
		return $this->view_layout();
	}

	function roles_del($id){
		if((int) $id){
			$this->user_model->_table = 'user_roles';
			$this->user_model->delete(['id' => $id]);
		}
		redirect(backend_url('user/roles'));
	}

	public function roles_edit($id = 0){
		$this->user_model->_table = 'user_roles';
		$this->user_model->roles = [
			'name'  => 'required|min_length[3]|max_length[32]',
		];
		$validate = $this->user_model->form_validate();
		if($validate->run()){
			$this->user_model->update_data();
			$this->session->set_flashdata(['message' => 'Cập nhật thành công']);
			redirect($this->uri->uri_string());
		}else{
			$this->website_info['title'] = $id ? 'Sửa nhóm quyền' : 'Thêm nhóm quyền mới';
			$this->setData['form'] = $this->user_model->add_or_edit_data($id);
			return $this->view_layout('edit');
		}
	}

	function roles_permission($id = 0){
		if($id){
			$this->user_model->_table = 'user_roles';
			$user_roles = $this->user_model->getInfo($id);
			if($user_roles){
				$validate = $this->user_model->form_validate();
				if($validate->run()){
					$get_list_role = $this->input->post();
					unset($get_list_role['submit_role']);
					$this->user_model->update(['permission' => implode(',',$get_list_role) ] , ['id' => $id]);
					$this->session->set_flashdata(['message' => 'Updated!']);
					redirect($this->uri->uri_string());
				}else{
					$this->load->helper('form');
					$this->setData['user_roles'] = $user_roles;
					$this->website_info['title'] = 'Add or Remove permission '.$user_roles->name;
					$user_roles_permission = $user_roles->permission ? explode(",", $user_roles->permission) : [];
					$this->setData['list_role'] = get_list_role_cms($user_roles_permission);
					return $this->view_layout();
				}
			}
		}
	}

	function get_list_role(){
		echo $this->user_model->getListRoleForm();
	}

}