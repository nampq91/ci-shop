<?php defined('BASEPATH') || exit('No direct script access allowed');

class Email extends MY_Controller_Service {

    function __construct(){
        parent::__construct();
        $this->load->model('email_model');
    }


    // Kiểm tra người dùng đã mở Email ra chưa. Thời điểm mở Email là khi nào
	public function logs(){
		$email = base64_decode($this->input->get('e',''));
		$content_id = (int) $this->input->get('c','');
		if($content_id && is_email($email)){
			$this->email_model->update_log($email , $content_id);
		}
		$this->set_output = '';
		$this->output->set_content_type('image/png');
		$im = @imagecreate(1, 1) or die();
		imagecolorallocate($im, 255, 255, 255);
		imagepng($im);
		imagedestroy($im);
	}

}