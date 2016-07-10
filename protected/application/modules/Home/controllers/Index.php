<?php defined('BASEPATH') || exit('No direct script access allowed');

class Index extends MY_Controller_Frontend {

	function __construct(){
        parent::__construct();
        $this->load->model('Admin/shop_item');
        $this->load->model('Admin/shop_category');
        $this->setData['menu'] = $this->setting_model->getListMenu();
        $this->setData['category'] = $this->shop_category->getListCategory();
    	$this->setData['top_hot'] = $this->shop_item->getTopHot();
    }

	public function index (){
		$this->layout = 'index';
		$this->load_css_style('css/styles.css');
		$this->setData['slider'] = $this->setting_model->getListSlider();
		$this->setData['list_category_home'] = $this->shop_item->getListCategory();
		$this->setData['top_news'] = $this->shop_item->getListRandom(5,'top_news');
		$this->setData['top_sale'] = $this->shop_item->getListRandom(5,'top_sale');
		$this->setData['top_inday'] = $this->shop_item->getListRandom(5,'top_inday');
		return $this->view_layout('homepage');
	}


	public function search(){
		$this->layout = 'search';
		$search = $this->input->get('search_query');
		$this->website_info['title'] = $search. ' | '. $this->website_info['title'];
		$this->load_css_style('css/category.css');
		$this->setData['list'] = $this->shop_item->getData(12 , ['name LIKE' => "%$search%" ]);
		return $this->view_layout('category');
	}


	public function category($id){
		$info = $this->shop_category->getInfo($id);
		if($info){
			$this->layout = 'category';
			$this->load_css_style('css/category.css');
			$this->setData['info'] = $info;
			$this->website_info['title'] = $info->name;
			$this->setData['list'] = $this->shop_item->getData(12);
			return $this->view_layout('category');
		}
	}

	public function detail($id){
		$info = $this->shop_item->getInfo($id);
		if($info){
			$info->category = $this->shop_category->getInfo($info->cat_id);
			$info->category->link = shop_category_url($info->category->id , $info->category->name );

			$this->layout = 'detail';
			$this->load_css_style('css/detail.css');
			$this->setData['info'] = $info;
			$this->website_info['title'] = $info->name;
			return $this->view_layout('detail');
		}		
	}

}