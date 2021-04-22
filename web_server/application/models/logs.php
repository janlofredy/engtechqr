<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Model {
	const DB_TABLE  = "logs";
	const DB_TABLE_PK = "log_id";


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

	public function logNow($estID,$indID){
		// $this->db->query('
		// 	IF NOT EXISTS (Select * from `logs` where establishment_id = 1 and individual_id = 24 and time_out is NULL) THEN
		// 		UPDATE `logs` SET time_out=NOW() WHERE  establishment_id = 1 and individual_id = 24 and time_out is NULL;
		// 	ELSE
		// 		INSERT INTO `logs` (`establishment_id`,`individual_id`,`time_in`) VALUES (1,24,NOW());
		// 	END IF
		// 	');
		$isNew = $this->db->where([
				'establishment_id'=>$estID,
				'individual_id'=>$indID,
				'time_out'=>null
			])->count_all_results($this::DB_TABLE);
		// return $isNew;
		$res = [];
		if( $isNew > 0 ){

			$res['data'] = $this->db->where([
				'establishment_id'=>$estID,
				'individual_id'=>$indID,
				'time_out'=>null
			])->set(['time_out'=>date("Y-m-d H:i:s"),'date_updated'=>date("Y-m-d H:i:s")])->update($this::DB_TABLE);
			$res['type']= 'Logged out';
			return $res;

		}else{
			$data= [
				'establishment_id'=>$estID,
				'individual_id'=>$indID,
				'time_in'=>date("Y-m-d H:i:s"),
				'date_created' => date("Y-m-d H:i:s")
			];
			$res['data'] =  $this->db->insert($this::DB_TABLE,$data);

			$res['type']='Logged in';
			return $res;
		}

	}

	public function getLogsBy($select,$where){
		return $this->db
			->where('establishment_id',$where['establishment_id'])
			->group_start()
			->where('time_in <=',$where['time_in'])
			->where('time_in >=',$where['time_out'])
			->group_end()
			->group_start()
			->where('time_out <=',$where['time_in'])
			->or_where('time_out is null',NULL,FALSE)
			->group_end()
			->select($select)
			->join('individual_info','logs.individual_id = individual_info.individual_id')
			->get($this::DB_TABLE)
			->result();
		return	$this->db->last_query();
	}

}