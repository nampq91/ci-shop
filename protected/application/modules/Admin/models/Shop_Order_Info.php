<?php defined('BASEPATH') || exit('No direct script access allowed');

class Shop_Order_Info extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->_table = 'shop_orders_info';
    }


    function getOrder($order_id){
    	return $this->where('order_id' , $order_id)->get();
    }


}