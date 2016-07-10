<?php defined('BASEPATH') || exit('No direct script access allowed');

class Shop_Item extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->_table = 'shop_items';
        $this->roles = [
            'name'  => 'required|min_length[10]|max_length[70]',
            'description'  => 'required|min_length[10]|max_length[250]',
            'photo'  => 'required',
        ];
    }

    public function getOption(){
    	$list = parent::getOption();
        $list['cat_id']['list'][0] = 'Chose Category';

        $this->_table = 'shop_category';
        $list_category = $this->get_where(['status > ' => 0] );
        foreach ($list_category as $cat_info) {
        	$list['cat_id']['list'][$cat_info->id] = $cat_info->name;
        }
        $list['store_status']['list'] = [
            '1' => 'Còn hàng',
            '-1' => 'Hết hàng',
        ];

        return $list;
    }


    public function getTopHot($limit = 10){
        $cache_key = md5('getTopHot_'.$limit);
        if( ( ! $list = $this->cache->get($cache_key) ) || $this->cache_update ){
            $list = $this->from($this->_table.' i')->join('shop_category c', 'c.id = i.cat_id')->select('i.* , c.name as cat_name')->where('i.status > ' , 0)->order_by('i.view_total' , 'DESC')->get($limit);
            foreach ($list as $item) {
                $item->link = shop_url($item->id , $item->name , $item->cat_name);
            }

            $this->cache->save($cache_key, $list, 3600);
        }
        return $list;
    }

    public function getListRandom($limit = 10 , $key = ''){
        $cache_key = md5('getListRandom_'.$limit.$key);
        if( ( ! $list = $this->cache->get($cache_key) ) || $this->cache_update ){
            $list = $this->from($this->_table.' i')->join('shop_category c', 'c.id = i.cat_id')->select('i.* , c.name as cat_name')->where('i.status > ' , 0)->order_by('i.id', 'RANDOM')->get($limit);
            foreach ($list as $item) {
                $item->link = shop_url($item->id , $item->name , $item->cat_name);
            }

            $this->cache->save($cache_key, $list, 3600);
        }
        return $list;
    }

    public function getListByCategory($cat_id , $limit = 5){
        $list = $this->from($this->_table.' i')->join('shop_category c', 'c.id = i.cat_id')->select('i.* , c.name as cat_name')->where('i.cat_id', $cat_id)->where('i.status > ' , 0)->order_by('i.created' , 'DESC')->get($limit);
        foreach ($list as $item) {
            $item->link = shop_url($item->id , $item->name , $item->cat_name);
        }
        return $list;
    }

    public function getListCategory(){
        $cache_key = md5('getListCategory');
        if( ( ! $data = $this->cache->get($cache_key) ) || $this->cache_update ){
            $this->load->model('shop_category');
            $data = [];
            foreach ( $this->shop_category->fetchAll() as $item) {
                $item->list = $this->getListByCategory($item->id , 5);
                if($item->list){
                    $data[] = $item;
                }
            }
            $this->cache->save($cache_key, $data, 3600);
        }
        return $data;
    }

}