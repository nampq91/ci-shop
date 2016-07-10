<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Controller_Backend extends MY_Controller{

    function __construct(){
        $this->dir_template = 'template/backend/';
        parent::__construct();
        $this->load->model('user_model');
        $this->setData['user_info'] = $this->user_model->has_login();
        if( !in_array( $this->method_name , ['login', 'captcha', 'get_captcha', 'do_login'] ) && !$this->setData['user_info']){
            redirect(backend_url('user/login'));
        }
        $this->setData['admin_menu'] = $this->get_admin_menu();
    }

    function get_admin_menu(){
        return get_list_role_cms();
    }

    function loading_style(){
        parent::loading_style();
        // Loading style
        $this->load_css_style('css/styles.css');

        $this->link_css('assets/jquery/fancybox/jquery.fancybox-1.3.4.css');
        $this->link_js('assets/jquery/fancybox/jquery.fancybox-1.3.4.js');
        $this->link_js('assets/jquery/autoNumeric/autoNumeric.js');
        $this->load_css_style('plugin/tagsinput/bootstrap-tagsinput.css');
        $this->load_js_style('plugin/tagsinput/bootstrap-tagsinput.js');
        $this->load_css_style('plugin/chosen/chosen.min.css');
        $this->load_js_style('plugin/chosen/chosen.jquery.min.js');

        $this->link_js('assets/tinymce/tinymce.min.js');
        $this->link_js('assets/tinymce/config.js');


        $this->load_js_style('js/main.js');

        $javascript_config = '<script type="text/javascript">';
        $javascript_config .= "var FILE_MANAGER_URL = '" . base_url( config_item('file_manager_url')) . "/';";
        $javascript_config .= "var FILE_MANAGER_KEY = '" . config_item('file_manager_key') . "';";
        $javascript_config .= '</script>';
        $this->link_header($javascript_config);
    }

}
