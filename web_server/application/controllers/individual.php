<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual extends MY_Controller {

	const cont = 'Individual';

	public function index()
	{
		$QR = "<center><img width='400px' src=".base_url().'QRimages/'.$this->session->userdata('qr_info').'-Qrcode.png'."></center>";
		// echo $QR;
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('view_user',['qr'=>$QR,'profile'=>$this->session->userdata()]);
		$this->load->view('template/footer');
		// echo '<center><pre>';
		// print_r( ($this->session->userdata()) );
		// echo '</pre></center>';
	}

	public function getQR() {
		$this->input->post('user_id');
		echo json_encode(['result'=>'AMAZING']);
	}


}
