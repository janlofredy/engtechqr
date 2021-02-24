<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_info extends MY_Model {
	const DB_TABLE  = "individual_info";
	const DB_TABLE_PK = "individual_id";

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

	public function getQRInfo($ID){
		return $this->db->where($this::DB_TABLE_PK,$ID)
			->select(['qr_info'])
			->get($this::DB_TABLE)
			->row()
			->qr_info;

	}

	public function getByQr($qrInfo){
		return $this->db->where('qr_info',$qrInfo)
			->select('*')
			->get($this::DB_TABLE)
			->row_array();
	}
	
}