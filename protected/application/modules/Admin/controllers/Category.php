<?php defined('BASEPATH') || exit('No direct script access allowed');

class Category extends MY_Controller_Backend {

	function __construct(){
        parent::__construct();
        $this->load->model('shop_category');
    }

	public function index (){
		$this->website_info['title'] = 'Danh mục sản phẩm';
		$this->setData['list'] = $this->shop_category->getData();
		return $this->view_layout();
	}


	public function edit(){
		$id = $this->method_name = $this->uri->segment(4) ?: '0';
		$this->website_info['title'] = $id ? 'Sửa danh mục' : 'Thêm danh mục mới';
		$this->setData['form'] = $this->shop_category->add_or_edit_data($id);
		return $this->view_layout('edit');
	}
	
}