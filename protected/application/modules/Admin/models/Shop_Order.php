<?php defined('BASEPATH') || exit('No direct script access allowed');

class Shop_Order extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->_table = 'shop_orders';
    }


}