<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establishment extends MY_Controller {

	const cont = 'Establishment';


	public function index()
	{
		$QR = "<center><img src=".base_url().'QRimages/'.$this->session->userdata('qr_info').'-Qrcode.png'."></center>";
		// echo $QR;
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('view_user',['qr'=>$QR]);
		$this->load->view('template/footer');
		// echo '<center><pre>';
		// print_r( array_values($this->session->userdata()) );
		// echo '</pre></center>';
	}

	public function getQR() {
		$this->input->post('user_id');
		echo json_encode(['result'=>'AMAZING']);
	}
	
}
