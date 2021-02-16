<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');

		if( !$this->session->has_userdata('user_data') ){
			redirect('/');
		}
	}

}


?>