<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	const cont = 'DEFAULT';
	
	public function __construct(){
		parent::__construct();
  		$this->load->library('phpqrcode/qrlib');
  		$this->load->library('encrypt');
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
			QRcode::png($text,$file_name);		
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

}