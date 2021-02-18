<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establishment extends CI_Controller {


	public function index()	{
		$this->load->view('welcome_message');
	}

	public function qrLog() {
		echo json_encode(['result'=>'success']);
	}

	public function qr_log() {
		echo json_encode(['result'=>'success']);
	}
}
