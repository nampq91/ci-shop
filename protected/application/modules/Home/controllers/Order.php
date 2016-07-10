<?php defined('BASEPATH') || exit('No direct script access allowed');

class Order extends MY_Controller_Frontend {

	function __construct(){
        parent::__construct();
        $this->load->model('Admin/shop_item');
    }

    function index(){
    	$this->layout = 'blank';
    }

    function add($id){    	
    	$this->layout = 'blank';
		$this->setData['info'] = $this->shop_item->getInfo($id);
    	return $this->view_layout();
    }


    function detail(){
    	$this->layout = 'blank';
        $order = $this->session->userdata('order_info');
        $data = [];
        if($order){
            foreach ($order as $key => $value) {
                $item = $this->shop_item->getInfo($key);
                $item->total = $value;
                $data[] = $item;
            }
        }
        $this->setData['data'] = $data;
    	return $this->view_layout();
    }

    function customer(){
        $this->layout = 'blank';
        return $this->view_layout();
    }

}
