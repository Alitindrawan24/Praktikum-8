<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamanController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Pinjaman');
		$this->load->helper('url');
		$this->load->library('session');
	}	

	public $folder = 'pinjaman';

	public function checkLogin(){
		$login = $this->session->userdata('login');
		if(!isset($login)){
			redirect('index.php/login');
		}
	}

	public function index(){
		$this->checkLogin();
		$data['pinjaman'] = $this->Pinjaman->load_data()->result_array();
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/index',$data);
		$this->load->view('layout/bottom');
	}

	public function create(){		
		$this->checkLogin();
		$data['anggota'] = $this->Pinjaman->load_anggota()->result_array();
		$data['petugas'] = $this->Pinjaman->load_petugas()->result_array();
		$data['buku'] = $this->Pinjaman->load_buku()->result_array();
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/create',$data);
		$this->load->view('layout/bottom');
	}

	public function edit($id){		
		$this->checkLogin();
		$data['pinjaman'] = $this->Pinjaman->load_one_data($id)->result_array();
		$data['buku'] = $this->Pinjaman->load_one_buku($id)->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/edit', $data);
		$this->load->view('layout/bottom');
	}

	public function store(){
		$this->checkLogin();
		$kd_anggota = $this->input->post('kd_anggota');
		$kd_pegawai = $this->input->post('kd_petugas');
		

		$data = array(
			'kd_anggota' => $kd_anggota,
			'kd_petugas' => $kd_pegawai
		);		

		$insertId = $this->Pinjaman->input_data($data,'Peminjaman');

		foreach ($this->input->post('buku') as $key) {
			$data2 = array(
				'kd_register' => $key,
				'kd_pinjam' => $insertId,
				'tgl_pinjam' => date('Y-m-d'),
				'tgl_kembali' => null
			);

			if($this->Pinjaman->input_data2($data2, 'detail_pinjam')){
				$query = true;
			}
			else{
				$query = false;
			}
		}		

		if($query){
			echo "Berhasil tambah data pinjaman";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		// $this->session->set_flashdata('message','Berhasil tambah data pinjaman');
		// redirect(base_url().'index.php/pinjaman','refresh');
	}

	public function update(){
		$this->checkLogin();
		$id = $this->input->post('kd_register');
		$judul_buku = $this->input->post('judul_buku');
		$pengarang = $this->input->post('pengarang');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit = $this->input->post('tahun_terbit');

		$data = array(
			'judul_buku' => $judul_buku,			
			'pengarang' => $pengarang,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit
		);

		$where = array(
			'kd_register' => $id
		);		

		if($this->Buku->update_data($data,'Buku',$where)){
			echo "Berhasil update data pinjaman";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		// $this->session->set_flashdata('message','Berhasil update data pinjaman');
		// redirect(base_url().'index.php/buku','refresh');
	}

	public function destroy($id){
		$this->checkLogin();
		$where = array('kd_pinjam' => $id);
		
		if($this->Pinjaman->hapus_data($where,'Peminjaman','detail_pinjam')){
			echo "Berhasil hapus data pinjaman";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		// $this->session->set_flashdata('message','Berhasil hapus data pinjaman');
		// redirect(base_url().'index.php/pinjaman','refresh');
	}
}
