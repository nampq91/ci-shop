<?php defined('BASEPATH') || exit('No direct script access allowed');

class Setting extends MY_Controller_Backend {

	public function website(){
		$this->website_info['title'] = 'Cấu hình chung cho website';
		$validate = $this->setting_model->form_validate();
		if($validate->run()){
			$this->setting_model->websiteConfigSubmit();
			$this->session->set_flashdata(['message' => 'Cập nhật thành công']);
			redirect($this->uri->uri_string());
		}else{
			$this->setData['form'] = $this->setting_model->websiteConfigForm();
			return $this->view_layout();
		}
	}


	public function menu(){
		$this->website_info['title'] = 'Cấu hình Menu';
		$this->setData['list'] = $this->setting_model->getListMenu();
		$this->setData['form'] = $this->setting_model->formMenu();
		return $this->view_layout();
	}

	function menu_submit(){
		if($this->setting_model->saveDataMenu() > 0){
			echo 'done';
		}else{
			echo 'false';
		}
	}

	function menu_delete(){
		$menu_id = $this->input->post('menu_id');
		if($this->setting_model->deleteMenu($menu_id) > 0){
			echo 'done';
		}else{
			echo 'false';
		}
	}


	public function slider(){
		$this->website_info['title'] = 'Cấu hình Slider';
		$this->setData['list'] = $this->setting_model->getListSlider();
		$this->setData['form'] = $this->setting_model->formSlider();
		return $this->view_layout();
	}

	function slider_submit(){
		if($this->setting_model->saveDataSlider() > 0){
			echo 'done';
		}else{
			echo 'false';
		}
	}

	function slider_delete(){
		$slider_id = $this->input->post('slider_id');
		if($this->setting_model->deleteSlider($slider_id) > 0){
			echo 'done';
		}else{
			echo 'false';
		}
	}



}