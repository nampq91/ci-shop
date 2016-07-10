<?php defined('BASEPATH') || exit('No direct script access allowed');

class User extends MY_Controller_Frontend {

	function __construct(){
        parent::__construct();
        //$this->load->model('Admin/shop_item');
    }

    function register(){
    	$this->layout = 'blank';
    	return $this->view_layout();
    }


    function login(){
        $this->layout = 'blank';
        return $this->view_layout();        
    }

}
