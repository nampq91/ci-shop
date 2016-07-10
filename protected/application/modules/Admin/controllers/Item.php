<?php defined('BASEPATH') || exit('No direct script access allowed');

class Item extends MY_Controller_Backend {

	function __construct(){
        parent::__construct();
        $this->load->model('shop_item');
        $this->load->model('shop_category');
    }

	public function index (){
		$this->website_info['title'] = 'Danh sách sản phẩm';
		$this->setData['list'] = $this->shop_item->getData();
		return $this->view_layout();
	}


	public function edit(){
		$id = $this->method_name = $this->uri->segment(4) ?: '0';
		$this->website_info['title'] = $id ? 'Sửa nội dung' : 'Thêm nội dung mới';
		$this->setData['form'] = $this->shop_item->add_or_edit_data($id);
		return $this->view_layout('edit');
	}
	
}