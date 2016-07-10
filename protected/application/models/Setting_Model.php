<?php defined('BASEPATH') || exit('No direct script access allowed');

class Setting_Model extends MY_Model {

    protected $site_key = [];

    function __construct(){
        parent::__construct();

        $this->_table = 'site_config';
        $this->roles = [
            'site_name'  => 'required|min_length[10]|max_length[70]',
        ];
        $this->site_key['website_config'] = 'site_manager';
        $this->site_key['website_menu'] = 'site_menu';
        $this->site_key['website_slider'] = 'site_slider';
    }

    function getConfig($site_key = ''){
        $cache_key = md5('site_config_'.$site_key);
        if( ( ! $getConfig = $this->cache->get($cache_key) ) || $this->cache_update ){
            $data = $this->select('site_val')->where('site_key',$site_key)->get_first();
            if($data){
                $getConfig = json_decode($data->site_val , true);
            }
            if($getConfig){
                $this->cache->save($cache_key, $getConfig, 3600);
            }else{
                $getConfig = array();
            }
        }
        return $getConfig;
    }

    /* Thiết lập menu */
    function getListMenu(){
        return $this->getConfig($this->site_key['website_menu']);
    }

    function formMenu(){
        $data = [
            'rank' => '',
            'name' => '',
            'link' => '',
        ];
        $option = [
            'id' => 'form_menu',
            'method' => 'post',
            'onsubmit' => 'return MenuSubmit();',
        ];
        return $this->form_create($data, $option);
    }

    function saveDataMenu(){
        $getList = $this->input->post();
        $data = [
            'rank' => $getList['rank'] ? $getList['rank'] : time(),
            'name' => $getList['name'],
            'link' => $getList['link'],
        ];

        $list = $this->getListMenu();
        $list[$data['rank']] = $data;
        ksort($list);
        $this->delete([ 'site_key' => $this->site_key['website_menu'] ] );
        $data_update = [
            'site_key' => $this->site_key['website_menu'] ,
            'site_val' => json_encode($list),
        ];
        return $this->insert($data_update);
    }

    function deleteMenu($menu_id){
        $list = $this->getListMenu();
        unset($list[$menu_id]);
        $this->delete([ 'site_key' => $this->site_key['website_menu'] ] );
        $data_update = [
            'site_key' => $this->site_key['website_menu'] ,
            'site_val' => json_encode($list),
        ];
        return $this->insert($data_update);
    }

    /* Thiết lập Cấu hình Slider */
    function getListSlider(){
        return $this->getConfig($this->site_key['website_slider']);
    }

    function formSlider(){
        $data = [
            'name' => '',
            'link' => '',
            'photo' => '',
            'description' => '',
        ];
        $option = [
            'id' => 'form_slider',
            'method' => 'post',
            'onsubmit' => 'return SliderSubmit();',
        ];
        return $this->form_create($data, $option);
    }

    function saveDataSlider(){
        $getList = $this->input->post();
        $data = [
            'id' => md5(time(). rand(100,999)),
            'name' => $getList['name'],
            'link' => $getList['link'],
            'photo' => $getList['photo'],
            'description' => $getList['description'],
        ];


        $list = $this->getListSlider();
        $list[$data['id']] = $data;
        $this->delete([ 'site_key' => $this->site_key['website_slider'] ] );
        $data_update = [
            'site_key' => $this->site_key['website_slider'] ,
            'site_val' => json_encode($list),
        ];
        return $this->insert($data_update);
    }

    function deleteSlider($slider_id){
        $list = $this->getListSlider();
        unset($list[$slider_id]);
        $this->delete([ 'site_key' => $this->site_key['website_slider'] ] );
        $data_update = [
            'site_key' => $this->site_key['website_slider'] ,
            'site_val' => json_encode($list),
        ];
        return $this->insert($data_update);
    }

    /* Thiết lập Cấu hình Website */
    function websiteConfigSubmit(){
        $site_key = 'site_manager';
        $getConfig = $this->input->post();
        if($getConfig){
            $this->delete([ 'site_key' => $this->site_key['website_config'] ] );
            if(isset($getConfig['Submit'])) unset($getConfig['Submit']);
            $data_update = [
                'site_key' => $this->site_key['website_config'] ,
                'site_val' => json_encode($getConfig),
            ];
            return $this->insert($data_update);
        }
    }
    function websiteConfigForm(){
        return $this->form_create($this->getConfig($this->site_key['website_config'] ));
    }

}