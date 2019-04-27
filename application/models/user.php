<?php
	class user extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function insert_data($data){
			$this->db->insert('user', $data);
			return $this->db->affected_rows();
		}

		public function load_data(){
			return $this->db->get('user');
		}
	}
?>