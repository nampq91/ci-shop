<?php defined('BASEPATH') || exit('No direct script access allowed');

class Shop_Category extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->_table = 'shop_category';
        $this->roles = [
            'name'  => 'required'
        ];
    }


    public function getOption(){
    	$list = parent::getOption();
        $list['parent_id']['list'][0] = 'Chose Category';
        $list_parent_category = $this->get_where(['parent_id' => 0 , 'status > ' => 0] );
        foreach ($list_parent_category as $cat_info) {
        	$list['parent_id']['list'][$cat_info->id] = $cat_info->name;
        }

        return $list;
    }

    function getCategoryName($cat_id){
        $info = $this->getInfo($cat_id);
        return $info ? $info->name : ' Chưa phân loại ';
    }

    function getListCategory(){
        $cache_key = md5('list_category_footer');
        if( ( ! $list = $this->cache->get($cache_key) ) || $this->cache_update ){
            $list = $this->fetchAll();
            foreach ($list as $item) {
                $item->link = shop_category_url($item->id , $item->name );
            }

            $this->cache->save($cache_key, $list, 3600);
        }
        return $list;
    }
}