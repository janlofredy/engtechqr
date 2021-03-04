<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

	const cont = 'Landing';

	public function index()	{
		// echo $this::cont;
		$modal['content'] = '<center>
		    <a href="<?=base_url($controller.\'/\')?>" type="button" class="btn btn-primary">Login as User</a>
		    <br><br>
		    <a href="<?=base_url($controller.\'/\')?>" type="button" class="btn btn-primary">Login as Establishment</a>
		<center>';
		set_modal_title('Login As');
		set_modal_content($modal);
		// $this->load->view('template/header',['controller'=>$this::cont]);
		// $this->load->view('template/addons/modal',$modal);
		// $this->load->view('welcome_message');
		// $this->load->view('template/footer');
		// $this->generateQr('070af40e1d89179');
		$this->load->view('home');
	}

	public function login_user(){
		$this->load->view('template/header');
		$this->load->view('login_user');
		$this->load->view('template/footer');
	}

	public function loginUser(){
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$user = $qrin->getByEmail($this->input->post('email_address'));
		// var_dump( $user );
		if($user){
			$email = $this->sendOTPtoEmail($user->individual_id,$user->email_address);
			// echo json_encode($email);
			// return $email;
			if($email){
				$user->result = 'success';
				echo json_encode($user);
				return $email;
			}else{
				echo json_encode(['result'=>'Failed to Send to Email']);
				return json_encode(['result'=>'Failed to Send to Email']);

			}
		}else{
			echo json_encode(['result'=>'Email Not Found']);
			return json_encode(['result'=>'Email Not Found']);
		}
		
		// if($email == 'success'){
		// 	echo json_encode( $user );
		// }
		// echo json_encode('error');
		
		
		// $this->load->model('individual_info');
		// $id = '24';
		// $this->session->set_userdata('type','Individual');
		// var_dump( $qrin->getOne($id) );
		// $data = $qrin->getOne($id);
		// $this->session->set_userdata($qrin->getOne($id) );
		// $this->session->set_userdata('qr_info',  );
		// $this->session->set_userdata('type','Individual');
		// redirect('landing');
	}

	public function sendOTPtoEmail($id,$email){
		$this->load->model('otp');
		$otpModel = new Otp;
		$otp = $otpModel->newOTP($id);
		$message = '<html>Your OTP is <b>"'.$otp.'"</b>.<br> Please do not share with others.<br>This can only be used within 5 mins.<br><br> This is a computer generated message. <b>Please do not reply.</b></html>';
		$email = $this->sendEmail('janlofredy@gmail.com','Jose Janlofre',$email,'Engtech QR OTP',$message);
		return $email;
		// if($email){
		// 	return 'success';
		// }
		

	}

	public function sendOTPtoMobile($id,$num){
		$this->load->model('otp');
		$otpModel = new Otp;
		$otp = $otpModel->newOTP($id);
		$message = '<html>Your OTP is <b>"'.$otp.'"</b>.<br> Please do not share with others.<br>This can only be used within 5 mins.<br><br> This is a computer generated message. <b>Please do not reply.</b></html>';
		$sms = $this->sendSMS();
		return $sms;
		if($sms){
			return 'success';
		}

	}

	public function resendOTPToEmail(){
		$email = $this->resendOTPToEmail( $this->input->post('email_address') );

		echo json_encode($email);
	}

	public function resendOTPToMobile(){
		$num = $this->resendOTPToMobile( $this->input->post('mobile_number') );

		echo json_encode($num);
	}

	public function verifyOTP(){
		$otp = $this->input->post('otp');
		$userid = $this->input->post('user_id');
		$this->load->model('otp');
		$otpMod = new Otp;
		$res = $otpMod->getOTP($userid, $otp);
		// echo json_encode($res);
		$result = '';
		if( date_diff( date_create($res->time),  date_create(date("Y-m-d H:i:s")))->i > 5){
			$result="OTP Expired";
		}else if($res->tries > 5){
			$result="Tries remaining: ". (5-$res->tries);
		}else{
			if($otp == $res->otp){
				$otpMod->OTPAccepted($res->otp_id);
				$result="Success";
			}else{
				$otpMod->OTPWrong($res->otp_id,($res->tries+1) );
				$result="Tries remaining: ". (5 - $res->tries);
			}
		}

		echo json_encode( ['result'=>$result] );

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
