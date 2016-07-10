<?php defined('BASEPATH') || exit('No direct script access allowed');

class Content extends MY_Controller_Service {

	public function tags(){
		$this->set_output = 'html';
		// $dict_data = file_get_contents( FCPATH.'/uploads/data/seo/dict.txt' );
		// $this->message = json_encode( explode("\n", $dict_data) );

		$this->message = "['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']";
	}

}