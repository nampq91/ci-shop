<?php defined('BASEPATH') || exit('No direct script access allowed');

class User_Model extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->_table = 'user_account';
    }

    function has_login(){
        return $this->session->userdata('user_info');
    }

    function encode_password($str){
        return md5('ci-backend-'.md5($str));
    }

    function login($email , $password){
        $user_info = $this->where('email',$email)->where('password',$this->encode_password($password))->where('status >','0')->get_first();
        if($user_info){
            $session_data['user_info'] = $user_info;
            $session_data['uid'] = $user_info->id;
            $session_data['username'] = $user_info->email;
            $this->session->set_userdata($session_data);
            return true;
        }else{
            return false;
        }
    }

    function user_info(){
        $user_info = $this->where('id',$this->session->userdata('uid'))->where('status >','0')->get_first();
        if($user_info){
            $session_data['user_info'] = $user_info;
            $session_data['uid'] = $user_info->id;
            $session_data['rid'] = $user_info->role_id;
            $session_data['username'] = $user_info->email;
            $this->session->set_userdata($session_data);
            return true;
        }else{
            return false;
        }
    }

    function change_pass($user_id , $password){
        return $this->update(['password' => $this->encode_password($password)] , ['id' => $user_id]);
    }

    function update_profile(){
        if($this->form_validate()->run()){
            $this->update_data();
            $this->session->set_flashdata(['message' => 'Updated!']);
            $this->user_info();
            redirect($this->uri->uri_string());
        }else{
            $table_info = $this->db->list_fields($this->_table);
            $table_data = $this->getInfo($this->session->userdata('uid'));
            $data = [];
            foreach ($table_info as $name) {
                if(in_array($name , ['id','name','email','avatar','phone','address','status'])){
                    $data[$name] = isset($_POST[$name]) ? $this->input->post($name) : (isset($table_data->$name) ? $table_data->$name : '');
                }
            }
            return $this->form_create($data);
        }
    }

    function getRoleById($role_id){
        $this->_table = 'user_roles';
        $role_info = $this->getInfo($role_id);
        return $role_info ? $role_info->name : '___';
    }

    function getListRoleForm(){
        $role_id = $this->session->userdata('rid');
        $this->_table = 'user_roles';
        $list_role = $this->fetchAll();
        $html = '<select class="form-control" id="user_role" name="user_role">';
        $html .= '<option value=""> Chose Role </option>';
        foreach ($list_role as $role) {
            $selected = ($role->id == $role_id) ? 'selected' : '';
            $html .= '<option '.$selected.' value="'.$role->id.'">'.$role->name.'</option>';
        }
        $html .= '</select>';
        return $html;
    }
}