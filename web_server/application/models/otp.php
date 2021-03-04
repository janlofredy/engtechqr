<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp extends MY_Model {
	const DB_TABLE  = "otp";
	const DB_TABLE_PK = "otp_id";


	public $columns = [
		['user_id',
			'int',
				'11',
					'NOT NULL',
						'AUTO_INCREMENT'],
		['username',
			'varchar',
				'50',
					'NULL',
						'DEFAULT NULL'],
		['password',
			'varchar',
				'255',
					'NULL',
						'DEFAULT NULL'],
		['user_type',
			'varchar',
				'50',
					'NULL',
						'DEFAULT NULL'],
		['is_not_temp_pass',
			'int',
				'1',
					'NULL',
						'DEFAULT NULL'],
	];

	public $index = [];

	public $unique = [];

	public function newOTP($user_id){
		$this->db->where('user_id',$user_id)->set('status','done')->update($this::DB_TABLE);
		$data = ['user_id'=> $user_id,
			'time'=>date("Y-m-d H:i:s"),
			'tries'=>0,
			'otp'=>mt_rand(100000,999999),
			'status'=>'ongoing',
			'date_created' =>date("Y-m-d H:i:s"),
			'date_updated'=>date("Y-m-d H:i:s")
			];
		$this->db->insert($this::DB_TABLE,$data);
		
		return $this->db->select('*')->where('otp_id',$this->db->insert_id())->get($this::DB_TABLE)->row()->otp;
		// return 
	}

	public function getOTP($user_id,$otp){
		$latest = $this->db->select('*')->where(['user_id'=>$user_id,'status'=>'ongoing'])->get($this::DB_TABLE)->row();
		return $latest;
	}

	public function OTPAccepted($otpid){
		$this->db->where('otp_id',$otpid)->set('status','done')->update($this::DB_TABLE);
	}

	public function OTPWrong($otpid,$newtries){
		$this->db->where('otp_id',$otpid)->set('status',$newtries)->update($this::DB_TABLE);
	}

}