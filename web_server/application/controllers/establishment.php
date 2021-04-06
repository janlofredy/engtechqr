<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establishment extends MY_Controller {

	const cont = 'Establishment';


	public function index()
	{
		$QR = "<center><img src=".base_url().'QRimages/'.$this->session->userdata('qr_info').'-Qrcode.png'."></center>";
		// echo $QR;
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('view_establishment',['qr'=>$QR,'profile'=>$this->session->userdata()]);
		$this->load->view('template/footer');
		// echo '<center><pre>';
		// print_r( array_values($this->session->userdata()) );
		// echo '</pre></center>';
	}

	public function getQR() {
		$this->input->post('user_id');
		echo json_encode(['result'=>'AMAZING']);
	}
	
	public function getLogs(){
		$eid = $this->input->post('establishment_id');
		$startDate = date($this->input->post('time_in'));
		$endDate = date($this->input->post('time_out'));
		$this->load->model('logs');
		$logMod = new Logs;
		echo json_encode( ['data'=>$logMod->getLogsBy(['concat(individual_info.first_name," ", individual_info.middle_name," ",individual_info.last_name) as name','time_in','time_out'], [ 'establishment_id' => $eid , 'time_out' => $startDate, 'time_in' => $endDate ])] );
	}

}
