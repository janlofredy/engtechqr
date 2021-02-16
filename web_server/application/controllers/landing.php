<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {


	public function index()	{
		if($this->uri->segment(1) == ''){
			redirect('landing');
		}
		$this->load->view('welcome_message');
	}

	public function create_user(){
		$this->load->view('create_user');
	}

	public function create_company(){
		$this->load->view('create_company');
	}

	public function createUser(){
		return $this->input->post();
	}

	public function createCompany(){
		return $this->input->post();
	}

}
