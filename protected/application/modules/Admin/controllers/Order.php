<?php defined('BASEPATH') || exit('No direct script access allowed');

class Order extends MY_Controller_Backend {

	function __construct(){
        parent::__construct();
        $this->load->model('shop_order');        
        $this->load->model('shop_order_info');        
        $this->load->model('shop_item');
        $this->load->model('shop_category');
    }

	public function index (){
		$this->website_info['title'] = 'Danh sách đơn đặt hàng';
		$list = $this->shop_order->getData();
		$this->setData['list'] = $list;
		return $this->view_layout();
	}


}