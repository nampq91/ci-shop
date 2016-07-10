<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $extraHeader = '', $extraFooter = '', $extraHeaderCSS = '', $extraHeaderJS = '', $extraFooterJS = '';
    protected $website_info = [];
    protected $setData = [];
    protected $dir_template = '';
    protected $css_version = '1.0';
    protected $js_version = '1.0';

    protected $layout_dir = 'layout/', $layout = 'default';
    protected $template_dir = 'page/';
    protected $module_name, $class_name, $method_name;


    function __construct(){
        parent::__construct();
        $this->module_name = $this->uri->segment(1) ?: 'home';
        $this->class_name = $this->uri->segment(2) ?: 'dashboard';
        $this->method_name = $this->uri->segment(3) ?: 'index';

        $this->load->model('setting_model');
        $this->website_info = $this->setting_model->getConfig('site_manager');
        $this->loading_style();
        $this->debugbar();
    }

    function loading_style(){
        $this->link_js('assets/jquery/jquery.min.js');
        $this->link_js('assets/jquery/jquery-migrate.min.js');

        $this->link_css('assets/bootstrap/css/bootstrap.min.css');
        $this->link_css('assets/bootstrap/css/bootstrap-theme.min.css');
        $this->link_css('assets/font-awesome/css/font-awesome.min.css');
        $this->link_js('assets/bootstrap/js/bootstrap.min.js');

        $javascript_config = '<script type="text/javascript">';
        $javascript_config .= "var BASE_URL = '" . base_url() . "';";
        $javascript_config .= "var TIME_NOW = '" . time() . "';";
        $javascript_config .= "var csrf_token = '".$this->security->get_csrf_hash()."';";
        $javascript_config .= "var csrf_token_name = '".config_item('csrf_token_name')."';";
        $javascript_config .= "var NO_IMAGE_URL = '" . base_url("uploads/default/no-photo.jpg") . "';";
        $javascript_config .= '</script>';
        $this->link_header($javascript_config);
    }

    function view_layout($template = ''){
        $push_data = [];
        if(!$this->website_info){
            show_error('Can\'t load system config from database', 500 , 'System Error!');
        }

        $push_data['website_info'] = $this->website_info; // Thông tin chung của Website
        $push_data['getData'] = $this->setData;

        $push_data['extraHeader'] = $this->extraHeader;
        $push_data['extraHeaderCSS'] = $this->extraHeaderCSS;
        $push_data['extraHeaderJS'] = $this->extraHeaderJS;

        $push_data['extraFooter'] = $this->extraFooter;
        $push_data['extraFooterJS'] = $this->extraFooterJS;

        $push_data['template'] = $this->template_dir. ($template ? $template : $this->class_name.'/'.$this->method_name);

        $push_data['module_name'] = $this->module_name;
        $push_data['class_name'] = $this->class_name;
        $push_data['method_name'] = $this->method_name;
        return $this->load->view($this->layout_dir. $this->layout , $push_data);
    }


    function load_css_style($file_css , $media = ''){
        return $this->link_css($this->dir_template. $file_css, $media);
    }

    function load_js_style($file_js , $media = ''){
        return $this->link_js($this->dir_template. $file_js, $media);
    }


    function link_css($file_name, $media = '') {
        $linkFile = site_url($file_name . '?version=' . $this->css_version);
        if( strpos($file_name, 'http://') === false || strpos($file_name, 'https://') === false ) {
            $linkFile = base_url($file_name);
        }
        if( $media ) {
            $html_css = '<link rel="stylesheet" media="' . $media . '" href="' . $linkFile . '?ver=' . $this->css_version . '" type="text/css">';
        } else {
            $html_css = '<link rel="stylesheet" href="' . $linkFile . '?ver=' . $this->css_version . '" type="text/css">';
        }


        if( strpos($this->extraHeaderCSS, $html_css) === false ) {
            $this->extraHeaderCSS .= $html_css . "\n";
        }
    }

    function link_js($file_name) {
        $linkFile = site_url($file_name . '?version=' . $this->css_version);
        if( strpos($file_name, 'http://') === false || strpos($file_name, 'https://') === false ) {
            $linkFile = base_url($file_name);
        }

        if( strpos($this->extraHeaderJS, '<script type="text/javascript" src="' . $linkFile . '"></script>') === false ) {
            $this->extraHeaderJS .= '<script type="text/javascript" src="' . $linkFile . '"></script>' . "\n";
        }
    }

    function link_header($text) {
        $this->extraHeader .= $text . "\n";
    }

    function link_footer($text) {
        $this->extraFooter .= $text . "\n";
    }

    public function _remap($method, $params = array()) {
        if( method_exists($this, $method) ) {
            $result = call_user_func_array(array( $this, $method ), $params);
            if( $result === FALSE ) {
                show_error('Do not call the specified method <strong>' . $method . '</strong> in class <strong>' . $this->class_name . '</strong>', 500, 'Do not call the specified method');
            }
        } else {
            show_error('Method <strong>' . $method . '</strong> does not exist in class <strong>' . $this->class_name . '</strong>', 500, 'Method does not exit');
        }
    }

    public function debugbar(){
        $debug = $this->input->get('debug');
        if($debug){
            $session_data['debug'] = $debug;
            $this->session->set_userdata($session_data);
        }
        if($this->session->userdata('debug') == 'on'){
            $this->load->add_package_path(APPPATH.'third_party/codeigniter-debugbar');
            $this->load->library('console');
            $this->link_js('assets/jquery/jquery.min.js');
            $this->link_js('assets/jquery/jquery-migrate.min.js');
            $this->link_js('assets/jquery/highlight/highlight.min.js');
            $this->link_js('assets/jquery/highlight/highlight.min.css');
            $this->link_css('assets/font-awesome/css/font-awesome.min.css');

            $this->output->enable_profiler(true);
        }
    }
}


require 'MY_Controller_Service.php';
require 'MY_Controller_Frontend.php';
require 'MY_Controller_Backend.php';