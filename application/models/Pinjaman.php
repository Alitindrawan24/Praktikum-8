<?php
	class Pinjaman extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function load_data(){
			return $this->db->get('peminjaman');
		}

		public function load_anggota(){
			return $this->db->get('anggota');
		}

		public function load_petugas(){
			return $this->db->get('petugas');
		}

		public function load_buku(){
			return $this->db->get('buku');
		}

		public function load_one_data($where){			
			return $this->db->where('id_pinjam',$where)->get('peminjaman');
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