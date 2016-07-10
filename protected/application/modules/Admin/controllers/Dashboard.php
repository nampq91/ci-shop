<?php defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends MY_Controller_Backend {

	public function index(){
		$this->website_info['title'] = 'Quản trị';
		return $this->view_layout();
	}

}