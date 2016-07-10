<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Controller_Frontend extends MY_Controller{

    function __construct(){
        $this->dir_template = 'template/frontend/';
        parent::__construct();
        if($this->session->userdata('cart_total_item') == FALSE){
            $this->session->set_userdata(['cart_total_item' => 0]);
        }

        //$this->output->cache(10);
        
        $this->load->model('user_model');
        $this->setData['user_info'] = $this->user_model->has_login();
    }


    function loading_style(){
        parent::loading_style();
        // Loading style
        $this->load_js_style('js/main.js');

        $this->link_css('assets/dialog/css/bootstrap-dialog.css');
        $this->link_js('assets/dialog/js/bootstrap-dialog.min.js');

        $this->load_js_style('js/function.js');


    }

}
