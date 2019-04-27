<?php
	class Pinjaman extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function load_data(){
			$this->db->from('peminjaman');
			$this->db->select('petugas.nama as nama1, anggota.nama as nama2,judul_buku,detail_pinjam.*');
			$this->db->join('petugas','petugas.kd_petugas=peminjaman.kd_petugas');
			$this->db->join('anggota','anggota.kd_anggota=peminjaman.kd_anggota');
			$this->db->join('detail_pinjam','detail_pinjam.kd_pinjam=peminjaman.kd_pinjam');
			$this->db->join('buku','buku.kd_register=detail_pinjam.kd_register');
			return $this->db->get();
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
			$insertId = $this->db->insert_id();

			return $insertId;
		}

		public function input_data2($data,$table){
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