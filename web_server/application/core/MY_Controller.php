<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Twilio\Rest\Client;

class MY_Controller extends CI_Controller {
	const cont = 'DEFAULT';
	
	public function __construct(){
		parent::__construct();
  		$this->load->library('phpqrcode/qrlib');
  		$this->load->library('encrypt');
  		$this->load->library('upload');
		$this->init();
	}

	public function init(){
		$this->load->library('session');
		$this->load->helper('url');
		if( $this->uri->segment(1) == '' ){
			redirect('landing');
		}
		// if( !$this->session->has_userdata('user_data') ){
		// 	redirect('landing');
		// }
		$this->isLoggedin();

	}

	public function isLoggedin(){
		if($this->session->has_userdata('type')){
			if($this->session->userdata('type') == 'Establishment' && 'Establishment' != $this::cont){
				redirect('establishment');
			}else if($this->session->userdata('type') == 'Individual' && 'Individual' != $this::cont){
				redirect('Individual');
			}
		}else if($this::cont != 'Landing'){
			redirect('landing');
		}
	}

	public function generateQr($qrtext){
		// $this->load->library('phpqrcode/qrlib');
		// include base_url('')."phpqrcode/qrlib.php";
		if(isset($qrtext)){
			$SERVERFILEPATH = 'QRimages/';
			// $_SERVER['DOCUMENT_ROOT'].'/qrcode-generation-in-codeigniter/images/';
			$text = $qrtext;
			$text1= preg_replace('/\s+/', '', $text );
			$folder = $SERVERFILEPATH;
			$file_name1 = $text1."-Qrcode.png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name,QR_ECLEVEL_H,10);		
			return "<center><img src=".base_url().'QRimages/'.$file_name1."></center>";
		}else{
			return 'No Text Entered';
		}
		// echo '<img src="">';
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('landing');
	}

	public function uploadFile($form_name,$file_name,$file_loc){
		$config['upload_path']          = $file_loc;
		$config['allowed_types']        = '*';
		$config['max_size']             = 10240;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['file_name']			= $file_name;
		$config['overwrite']			= false;

		$this->upload->initialize($config);
		

		if ( ! $this->upload->do_upload($form_name)){
			$error = array('error' => $this->upload->display_errors());
			return ['data'=>$error,'result'=>false];
			// $this->load->view('upload_form', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			return ['data'=>$data,'result'=>true];
			// $this->load->view('upload_success', $data);
		}
	}

	public function sendEmail($from,$fromName,$to,$subject,$content){
		$this->load->library('email');

		$this->email->mailtype = 'html';
		$this->email->from($from, $fromName);
		$this->email->to($to);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject($subject);
		$this->email->message($content);

		return $this->email->send();
	}


	public function sendMessageTwilio($toNumber, $message){

		$twilio_number = "+15037447958";
		$to_num= $toNumber;

		$sid = 'AC3e49f8f5251e540e222d049e01f5ce4e';
		$token = '879797d03358b96576b07a0bcaec107d';
		$client = new Client($sid, $token);

		// Use the client to do fun stuff like send text messages!
		 return $client->messages->create(
			// the number you'd like to send the message to
			$to_num,
			array(
				// A Twilio phone number you purchased at twilio.com/console
				"from" => $twilio_number,
				// the body of the text message you'd like to send
				'body' => $message
			)
		);
		// Your Account SID and Auth Token from twilio.com/console
		// Include the bundled autoload from the Twilio PHP Helper Library
		// require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
		// In production, these should be environment variables. E.g.:
		// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
		// $client = new Client($account_sid, $auth_token);
		// $client->messages->create(
		// 	// Where to send a text message (your cell phone?)
		// 	'+639127051862',
		// 	array(
		// 		'from' => $twilio_number,
		// 		'body' => 'I sent this message in under 10 minutes!'
		// 	)
		// );

	}
}