<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

	const cont = 'Landing';

	public function login_user(){

	}

	public function loginUser(){
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$id = '24';
		$this->session->set_userdata('type','Individual');
		// var_dump( $qrin->getOne($id) );
		// $data = $qrin->getOne($id);
		$this->session->set_userdata($qrin->getOne($id) );
		// $this->session->set_userdata('qr_info',  );
		// $this->session->set_userdata('type','Individual');
		redirect('individual');
	}

	public function login_establishment(){
		// $this->generateQr('070af40e1d89179');
	}


	public function loginEstablishment(){
		$this->load->model('establishment_info');
		$qrin = new Establishment_info;
		$id = '1';
		$this->session->set_userdata('type','Establishment');
		$this->session->set_userdata($qrin->getOne($id) );
		redirect('Establishment');
		// $this->session->set_userdata('type','Establishment');
	}

	public function index()	{
		// echo $this::cont;
		$modal['content'] = '<center>
		    <a href="<?=base_url($controller)/loginUser?>" type="button" class="btn btn-primary">Login as User</a>
		    <br>
		    <a href="<?=base_url($controller)/loginEstablishment?>" type="button" class="btn btn-primary">Login as Establishment</a>
		<center>';
		set_modal_title('Login As');
		set_modal_content
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('template/addons/modal',$modal);
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
		// $this->generateQr('070af40e1d89179');
	}

	public function create_user(){
		$this->load->view('template/header');
		$this->load->view('create_user');
		$this->load->view('template/footer');
		// echo $this->generateQr('ENGTECH QR');
	}

	public function create_company(){
		$this->load->view('create_company');
	}

	public function createUser(){
		// var_dump($this->input->post());
		$this->load->model('individual_info');
		$indiv = new Individual_info;
		$qrInfo = $indiv->insertNew($this->input->post());
		$qrin = new Individual_info;
		$qr_info = $qrin->getQRInfo($qrInfo);
		$this->generateQr($qr_info);

		$qrin = new Individual_info;
		$this->session->set_userdata('type','Individual');
		$this->session->set_userdata($qrin->getOne($qrInfo) );
		redirect('individual');
		// echo $qr_info;

	}

	public function createCompany(){
		return $this->input->post();
	}

}
