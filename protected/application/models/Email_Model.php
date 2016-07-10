<?php defined('BASEPATH') || exit('No direct script access allowed');

class Email_Model extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->_table = 'email_logs';
    }

    function update_log($email , $content_id){
        $this->load->library('user_agent');
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent = 'Unidentified User Agent';
        }
        $data = [
            'browser' => $agent , 
            'opera_system' => $this->agent->platform(),
            'referrer' => $this->agent->referrer(),
            'url' => base_url(uri_string()),
            'ip' => $this->input->ip_address(),
            'read_email_at' => time(),
            'status' => 2
        ];

        return $this->update($data , ['status' => 1 , 'email' => $email , 'content_id' => $content_id]);
    }

}