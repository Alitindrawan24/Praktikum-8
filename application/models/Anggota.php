<?php
	class Anggota extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function load_data(){
			return $this->db->get('anggota');
		}

		public function load_one_data($where){			
			return $this->db->where('kd_anggota',$where)->get('anggota');
		}

		public function input_data($data,$table){
			$this->db->insert($table,$data);
		}

		public function update_data($data,$table,$where){
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		public function hapus_data($where, $table){
			$this->db->where($where);
			$this->db->delete($table);
		}
		
	}
?>