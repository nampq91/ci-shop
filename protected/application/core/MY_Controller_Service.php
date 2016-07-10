<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Controller_Service extends CI_Controller{

    protected $module_name, $class_name, $method_name;
    protected $status = -1, $message = '', $data = [], $set_output = 'json';

    function __construct(){
        parent::__construct();
        $this->module_name = $this->uri->segment(1);
        $this->class_name = $this->uri->segment(2);
        $this->method_name = $this->uri->segment(3) ?: 'index';
    }


    public function __destruct() {
        $this->ReturnData();
    }

    function index(){
        $this->set_output = 'html';
        $this->status = -1;
        $this->message = 'Index Service';
    }

    protected function ReturnData() {
        switch ($this->set_output) {
            case 'data':
                echo json_encode($this->data);
                break;
            case 'html':
                echo $this->message;
                break;
            case 'json':
                echo json_encode($this->return_json());
            default:
                break;
        }
        exit();
    }

    protected function return_json() {
        $action = $this->class_name. '-'. $this->method_name;
        return [
            'action' => $action,
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }
}