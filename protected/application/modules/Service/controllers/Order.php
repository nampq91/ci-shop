<?php defined('BASEPATH') || exit('No direct script access allowed');

class Order extends MY_Controller_Service {

	public function add($id){
		$order = $this->session->userdata('order_info');
		if(is_null($order)) $order = [];
		if(isset($order[$id])){
			$this->message = 'Sản phẩm đã được lựa chọn';
		}else{
			$order[$id] = $this->input->post_get('total' , 1);		
			$this->session->set_userdata(['order_info' => $order]);
			$this->status = 1;
		}
	}

	public function remove($id){
		$order = $this->session->userdata('order_info');
		if(isset($order[$id])){
			unset($order[$id]);
			$this->session->set_userdata(['order_info' => $order]);
			$this->status = 1;			
		}else{
			$this->message = 'Sản phẩm chưa được lựa chọn';
		}
	}

	public function update(){
		//data: {info_fullname:info_fullname , info_email:info_email , info_phone:info_phone , info_address:info_address , info_note:info_note},
		
		$data = [
			'fullname' => $this->input->get('info_fullname'),
			'email' => $this->input->get('info_email'),
			'phone' => $this->input->get('info_phone'),
			'address' => $this->input->get('info_address'),
			'note' => $this->input->get('info_note'),
			'created' => time(),
			'user_id' => $this->session->userdata('uid'),
		];

		$this->load->model('Admin/shop_item');
		$this->load->model('Admin/shop_order');
		$this->load->model('Admin/shop_order_info');
		$order_id = $this->shop_order->insert($data);

		$order = $this->session->userdata('order_info');
        $data = [];
        if($order){
            foreach ($order as $key => $value) {
                $order_info = [
                	'order_id' => $order_id,
                	'item_id' => $key,
                	'total' => $value,
                	'created' => time()
                ];
                $item = $this->shop_item->getInfo($key);
                $order_info['name'] = $item->name;
                $order_info['photo'] = $item->photo;
                $order_info['price'] = $item->price_promotion;
                $this->shop_order_info->insert($order_info);
            }
        }
        $this->session->set_userdata(['order_info' => [] ]);
        $this->status = 1;
        $this->message = 'Bạn đã đặt hàng thành công. Chúng tôi sẽ sớm liên hệ lại với bạn';
	}

}