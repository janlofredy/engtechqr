<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function qrLog() {
		echo json_encode(['result'=>'AMAZING']);
	}

	public function qr_log() {
		echo json_encode(['result'=>rand(0,199)]);
	}
}
