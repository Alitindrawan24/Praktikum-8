<?php
	class Pinjaman extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function load_data(){
			$this->db->from('peminjaman');
			$this->db->select('petugas.nama as nama1, anggota.nama as nama2,judul_buku,detail_pinjam.*,count(peminjaman.kd_pinjam) as jumlah_buku');
			$this->db->join('petugas','petugas.kd_petugas=peminjaman.kd_petugas');
			$this->db->join('anggota','anggota.kd_anggota=peminjaman.kd_anggota');
			$this->db->join('detail_pinjam','detail_pinjam.kd_pinjam=peminjaman.kd_pinjam');
			$this->db->join('buku','buku.kd_register=detail_pinjam.kd_register');
			$this->db->group_by('kd_pinjam');
			return $this->db->get();
		}

		public function load_anggota(){
			return $this->db->get('anggota');
		}

		public function load_petugas(){
			//return $this->db->get('petugas');
			return $this->db->where('kd_petugas',$this->session->userdata('id'))->get('petugas');
		}

		public function load_buku(){
			return $this->db->get('buku');
		}

		public function load_one_data($where){
			$this->db->from('peminjaman');
			$this->db->select('petugas.nama as nama1, anggota.nama as nama2,count(peminjaman.kd_pinjam) as jumlah_buku,kd_pinjam');
			$this->db->join('petugas','petugas.kd_petugas=peminjaman.kd_petugas');
			$this->db->join('anggota','anggota.kd_anggota=peminjaman.kd_anggota');			
			return $this->db->where('peminjaman.kd_pinjam',$where)->get('');
		}

		public function load_one_buku($where){
			$this->db->from('peminjaman');			
			$this->db->join('detail_pinjam','detail_pinjam.kd_pinjam=peminjaman.kd_pinjam');
			$this->db->join('buku','buku.kd_register=detail_pinjam.kd_register');
			return $this->db->where('peminjaman.kd_pinjam',$where)->get('');
		}

		public function input_data($data,$table){
			$this->db->insert($table,$data);
			$insertId = $this->db->insert_id();

			return $insertId;
		}

		public function input_data2($data,$table){
			return $this->db->insert($table,$data);			
		}

		public function update_data($data,$table,$where){
			$this->db->where($where);
			return $this->db->update($table, $data);
		}

		public function hapus_data($where, $table, $table2){
			$this->db->where($where);
			$this->db->delete($table2);
			$this->db->where($where);
			return $this->db->delete($table);			
		}
		
	}
?>