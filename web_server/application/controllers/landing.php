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
		$this->generateQr('b7c59c55c3b761a');
		$this->load->view('home');
	}

	public function login_user(){
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('login_user');
		$this->load->view('template/footer');
	}

	public function loginUser(){
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$user = $qrin->getByEmail($this->input->post('email_address'));
		if($user){
			$email = $this->sendOTPtoEmail($user->user_id,$user->email_address);
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
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$email = $this->input->post('email_address');
		$user = $qrin->getByEmail($email);
		if($user){
			$email = $this->sendOTPtoEmail($user->user_id,$user->email_address);
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
	}

	public function resendOTPToMobile(){
		$num = $this->sendOTPtoMobile( $this->input->post('mobile_number') );

		echo json_encode($num);
	}

	public function verifyOTP(){
		$otp = $this->input->post('otp');
		$userid = $this->input->post('user_id');
		$this->load->model('otp');
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$otpMod = new Otp;
		$res = $otpMod->getOTP($userid, $otp);
		// echo json_encode($res);
		$result = '';
		if($res){
			if( date_diff( date_create($res->time),  date_create(date("Y-m-d H:i:s")))->i > 5){
				$result="OTP Expired";
			}else if($res->tries >= 5){
				$result="You Have used all your tries. Please Try again Later";
				$otpMod->OTPAccepted($res->otp_id);
			}else{
				if($otp == $res->otp){
					$otpMod->OTPWrong($res->otp_id,($res->tries+1) );
					$otpMod->OTPAccepted($res->otp_id);
					$result="success";
					// $this->session->set_userdata('type','Individual')
					$this->session->set_userdata($qrin->getBy(['user_id'=>$userid]) );
					// $this->session->set_userdata('qr_info',  );
					$this->session->set_userdata('type','Individual');
				}else{
					$otpMod->OTPWrong($res->otp_id,($res->tries+1) );
					$result="Tries remaining: ". (5 - $res->tries);
				}
			}	
		}else{
			$result="OTP Expired or You have used your alloted tries ";
		}
		

		echo json_encode( [ 'result' => $result ] );
	}

	public function resendOTPToEmailEst(){
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$email = $this->input->post('email_address');
		$user = $qrin->getByEmail($email);
		if($user){
			$email = $this->sendOTPtoEmail($user->user_id,$user->email_address);
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
	}

	public function resendOTPToMobileEst(){
		$num = $this->sendOTPtoMobile( $this->input->post('mobile_number') );

		echo json_encode($num);
	}

	public function verifyOTPEst(){
		$otp = $this->input->post('otp');
		$userid = $this->input->post('user_id');
		$this->load->model('otp');
		$this->load->model('individual_info');
		$qrin = new Individual_info;
		$otpMod = new Otp;
		$res = $otpMod->getOTP($userid, $otp);
		// echo json_encode($res);
		$result = '';
		if($res){
			if( date_diff( date_create($res->time),  date_create(date("Y-m-d H:i:s")))->i > 5){
				$result="OTP Expired";
			}else if($res->tries >= 5){
				$result="You Have used all your tries. Please Try again Later";
				$otpMod->OTPAccepted($res->otp_id);
			}else{
				if($otp == $res->otp){
					$otpMod->OTPWrong($res->otp_id,($res->tries+1) );
					$otpMod->OTPAccepted($res->otp_id);
					$result="Success";
					// $this->session->set_userdata('type','Individual')
					$this->session->set_userdata($qrin->getBy(['user_id'=>$userid]) );
					// $this->session->set_userdata('qr_info',  );
					$this->session->set_userdata('type','Individual');
				}else{
					$otpMod->OTPWrong($res->otp_id,($res->tries+1) );
					$result="Tries remaining: ". (5 - $res->tries);
				}
			}	
		}else{
			$result="OTP Expired or You have used your alloted tries ";
		}
		

		echo json_encode( [ 'result' => $result ] );
	}

	public function login_establishment(){
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('login_establishment');
		$this->load->view('template/footer');
	}


	public function loginEstablishment(){
		$this->load->model('establishment');
		$qrin = new Establishment;
		$user = $qrin->getByEmail($this->input->post('email_address'));
		if($user){
			$email = $this->sendOTPtoEmail($user->user_id,$user->email_address);
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
	}

	public function create_user(){
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('create_user');
		$this->load->view('template/footer');
		// echo $this->generateQr('ENGTECH QR');
	}

	public function create_establishment(){
		$this->load->view('template/header',['controller'=>$this::cont]);
		$this->load->view('create_company');
		$this->load->view('template/footer');
	}

	public function createUser(){
		$data = $this->input->post();
		$this->db->trans_start();
		// var_dump($data);
		unset($data['terms']);
		unset($data['otp_email']);
		unset($data['otp']);
		$facePath = 'imageUploads/faceImages/';
		$idPath = 'imageUploads/idImages/';
		$faceidPath = 'imageUploads/faceidImages/';
		$this->load->model('users');
		$usr = new Users;
		$usrID = $usr->insertNew(['is_not_temp_pass'=>1]);
		$data['user_id'] = $usrID;

		$this->load->model('individual_info');
		$indiv = new Individual_info;
		$qrInfo = $indiv->insertNew($data);
		$faceimg = $this->uploadFile('face_image',$usrID,$facePath);
		$idimg = $this->uploadFile('id_image',$usrID,$idPath);
		$faceidimg = $this->uploadFile('face_id_image',$usrID,$faceidPath);
		// echo '<pre>';
		// var_dump($faceimg);
		// var_dump($idimg);
		// var_dump($faceidimg);
		// echo '</pre>';
		if($faceimg['result'] && $idimg['result'] && $faceidimg['result']){

			$a = $facePath.$faceimg['data']['upload_data']['file_name'];
			$b = $idPath.$idimg['data']['upload_data']['file_name'];
			$c = $faceidPath.$faceidimg['data']['upload_data']['file_name'];
			$indiv->updateById($qrInfo,['face_image'=>$a,'id_image'=>$b,'face_id_image'=>$c]);
			$qrin = new Individual_info;
			$qr_info = $qrin->getQRInfo($qrInfo);
			$this->generateQr($qr_info);
			$email = $data['email_address'];
			$num = $this->sendOTPtoEmail( $usrID, $email );
			// echo($num);

			echo json_encode(['result'=>true,'message'=>'Check your e-mail for your OTP','data'=>$indiv->getOne($qrInfo)]);
			// echo json_encode();
		// 	// $qrin = new Individual_info;
		// 	// $this->session->set_userdata('type','Individual');
			// $this->session->set_userdata($qrin->getOne($qrInfo) );
		// 	// redirect('individual');
			$this->db->trans_complete();
		}else{
			echo json_encode(['result'=>false,'message'=>'Failed to upload your images. Please select an image smaller than 10mB']);
		}
		// echo $qr_info;

	}

	public function createCompany(){
		return $this->input->post();
	}

	public function verifyDuplicate(){
		$this->load->model('individual_info');
		$where = $this->input->post();
		$id = new Individual_info;
		echo json_encode(['result'=>$id->getBy($where)]);
	}

}
