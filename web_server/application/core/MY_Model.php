<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	const DB_TABLE = "default";
	const DB_TABLE_PK = "default";
	
	public $date_created;
	public $date_updated;

	public $columns = [];

	public $index = [];

	public $unique = [];
	
	public function makeTable(){
		$create_table = 'CREATE [TEMPORARY] TABLE IF NOT EXISTS `'.$this::DB_TABLE.'`(';
		$rows = '';
		foreach ($columns as $tblRow) {
			$rows += '`'.$tblRow[0].'` '.$tblRow[1].'('.$tblRow[2].')'.(strtolower($tblRow[1])=='varchar') ? ' CHARACTER SET latin1 COLLATE latin1_swedish_ci' : ''.' '.$tblRow[3].' '.$tblRow[4].'  ,';
		}
		$create_table += $rows;
		$create_table += '`date_created` datetime(0) NULL DEFAULT current_timestamp(0),
					`date_updated` datetime(0) NULL DEFAULT current_timestamp(0),
					PRIMARY KEY (`'.$this::DB_TABLE_PK.'`) USING BTREE,';

					
		foreach ($unique as $key => $value) {
			$create_table += ' UNIQUE INDEX `qr_info`(`qr_info`) USING BTREE,';
		}
		foreach ($index as $key => $value) {
			$create_table += 'INDEX `'.$this::DB_TABLE.'establishment_info_ibfk_1`(`user_id`) USING BTREE,';
		}
		'CONSTRAINT `establishment_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
		) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;';
	}

	public function insertNew($data){
		$this->db->insert($this::DB_TABLE,$data);
		return $this->db->insert_id();
	}

	public function getOne($id){
		return $this->db->where($this::DB_TABLE_PK,$id)
			->select('*')
			->get($this::DB_TABLE)
			->row_array();
	}
	
	public function getBy($where){
		return $this->db->where($where)
			->select('*')
			->get($this::DB_TABLE)
			->row_array();
		return	$this->db->last_query();
	}
	
	public function getSomeBy($select,$where){
		return $this->db->where($where)
			->select($select)
			->get($this::DB_TABLE)
			->result();
		return	$this->db->last_query();
	}

	public function updateById($id,$arr){
		$arr['date_updated'] = date("Y-m-d H:i:s");
		return $this->db->where($this::DB_TABLE_PK,$id)->set($arr)->update($this::DB_TABLE);
	}
}