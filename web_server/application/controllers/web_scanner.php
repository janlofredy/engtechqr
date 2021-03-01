<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_scanner extends CI_Controller {

	const cont = 'Web_scanner';

	public function index()	{
		$this->load->view('scanQR');
	}

	public function qrLog() {
		$this->load->model('establishment_info');
		$this->load->model('individual_info');
		$qrInfoEst = $this->input->post('qrInfoEst');
		$qrInfoInd = $this->input->post('qrInfoInd');
		$estMod = new Establishment_info;
		$indMod = new Individual_info;
		$estID = $estMod->getByQr($qrInfoEst)['establishment_id'];
		$indID = $indMod->getByQr($qrInfoInd)['individual_id'];

		$this->load->model('logs');
		$log = new Logs;
		if( $log->logNow($estID,$indID) ){
			echo json_encode(['result'=>'Success']);	
		}else{
			echo json_encode(['result'=>'Failed']);
		}
	}

	public function getIndividual(){
		$this->load->model('individual_info');
		$qrInfoInd = $this->input->post('qrInfo');
		$indMod = new Individual_info;
		$indOut = $indMod->getByQr($qrInfoInd);
		echo json_encode($indOut);
	}

	public function getEstablishment(){
		$this->load->model('establishment_info');
		$qrInfoEst = $this->input->post('qrInfo');
		$estMod = new Establishment_info;
		$estOut = $estMod->getByQr($qrInfoEst);
		echo json_encode($estOut);
	}
}
