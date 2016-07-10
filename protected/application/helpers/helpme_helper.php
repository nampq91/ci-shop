<?php

defined('BASEPATH') || exit('No direct script access allowed');

if( !function_exists('safe_title') ) {

    function safe_title($str = '') {
        $str = html_entity_decode($str, ENT_QUOTES, "UTF-8");
        $filter_in = array( '#(a|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', '#(A|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#', '#(e|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#', '#(E|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#', '#(i|ì|í|ị|ỉ)#', '#(I|ĩ|Ì|Í|Ị|Ỉ|Ĩ)#', '#(o|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#', '#(O|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#', '#(u|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#', '#(U|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#', '#(y|ỳ|ý|ỵ|ỷ|ỹ)#', '#(Y|Ỳ|Ý|Ỵ|Ỷ|Ỹ)#', '#(d|đ)#', '#(D|Đ)#' );
        $filter_out = array( 'a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'y', 'Y', 'd', 'D' );
        $text = preg_replace($filter_in, $filter_out, $str);
        $text = preg_replace('/[^a-zA-Z0-9]/', ' ', $text);
        $text = trim(preg_replace('/ /', '-', trim(strtolower($text))));
        $text = preg_replace('/--/', '-', $text);
        return preg_replace('/--/', '-', $text);
    }

}

if( !function_exists('shop_url') ) {

    function shop_url($shop_id = 0, $name = '' , $category) {
        $CI = & get_instance();
        $uri = safe_title($category). '/' . safe_title($name).'-s'.$shop_id;
        return $CI->config->site_url($uri);
    }
}

if( !function_exists('shop_category_url') ) {

    function shop_category_url($cat_id = 0, $name = '') {
        $CI = & get_instance();
        return $CI->config->site_url(safe_title($name).'-c'.$cat_id);
    }
}



if( !function_exists('backend_url') ) {

    function backend_url($uri = '') {
        return base_url('admin/'.$uri);
    }
}

if(!function_exists('get_method_public_in_class')){
    function get_method_public_in_class($class_file){
        $find_public = '/public function[\s\n]+(\S+)[\s\n]*\(/';
        $list_method = array();
        $fileContents = file_get_contents( $class_file);
        preg_match_all( $find_public , $fileContents , $list_method );
        if( count( $list_method )>1 ){
          return $list_method[1];
        }else{
            return false;
        }
    }
}

if(!function_exists('get_list_role_cms')){
    function get_list_role_cms($user_roles_permission = []){
        $list_role = [];
        $dir_backend = APPPATH.'modules/Admin/controllers/';
        $list_modeles = glob($dir_backend . "*.php");
        foreach($list_modeles as $module){
            $class_name = strtolower(basename($module, ".php"));
            $list_method = get_method_public_in_class($module);
            if($list_method){
                $data = [];
                foreach ($list_method as $method) {
                    $tmp = [];
                    $method_role = $class_name.'_'.$method;
                    $tmp['link'] = backend_url($class_name.'/'.$method);
                    $tmp['role'] = $method_role;
                    $tmp['name'] = method_to_name($method).' '.ucfirst($class_name);
                    $tmp['checked'] = in_array($method_role , $user_roles_permission) ? 'checked' : '';
                    $data[] = $tmp;
                }
                $list_role[$class_name] = $data;
            }
        }
        return $list_role;
    }
}


if(!function_exists('method_to_name')){
    function method_to_name($method = '') {
        if($method == 'index') return 'List';
        return ucwords(str_replace(array('.', '-', '_'), ' ', $method));
    }
}

if (!function_exists('show_captcha')) {

    function show_captcha($captcha_session = 'captcha_cis' ) {
        $captcha_str = "data:image/png;base64,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";
        $CI =& get_instance();
        $string = strtoupper(substr(md5('captcha-2015-'. microtime() * time()), 10, 6));
        $captcha = imagecreatefrompng($captcha_str);
        $black = imagecolorallocate($captcha, 0, 0, 0);
        $line = imagecolorallocate($captcha, 255, 255, 255);
        for ($i = 0; $i < 10; $i++) {
            $v1 = rand(0, 64);
            $v2 = rand(0, 64);
            $v3 = rand(0, 64);
            $v4 = rand(0, 64);
            imageline($captcha, $v1, $v2, $v3, $v4, $line);
        }
        imagestring($captcha, 6, 25, 3, $string, $black);
        $session_data[$captcha_session] = md5($string);
        $CI->session->set_userdata($session_data);

        header("Content-type: image/png");
        imagepng($captcha);
    }

}

if(!function_exists('is_email')){
    function is_email($email) {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" , strtolower(trim($email) ) );
    }
}

if(!function_exists('is_mobile')){
    function is_mobile($value = '') {
        return preg_match('#^(01([0-9]{2})|09[0-9])(\d{7})$#' , $value);
    }
}


if ( ! function_exists('get_random_str')){
    function get_random_str($chars_length=8, $use_upper_case=false, $include_numbers=true, $include_special_chars=true){
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }

        $password = "";
        for($i=0; $i<$chars_length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
            $password .=  $current_letter;
        }

      return $password;
    }

}

if(!function_exists('priceToFloat')){
    function priceToFloat($s){
        $s = str_replace(',', '.', $s);// convert "," to "."
        $s = preg_replace("/[^0-9\.]/", "", $s);// remove all but numbers "."
        $hasCents = (substr($s, -3, 1) == '.');// check for cents
        $s = str_replace('.', '', $s);// remove all seperators
        if ($hasCents){
            $s = substr($s, 0, -2) . '.' . substr($s, -2);// insert cent seperator
        }
        return (float) $s;// return float
    }
}