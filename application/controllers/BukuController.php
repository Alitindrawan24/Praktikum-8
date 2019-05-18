<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Buku');
		$this->load->helper('url');
		$this->load->library('session');
	}	

	public $folder = 'buku';

	public function checkLogin(){
		$login = $this->session->userdata('login');
		if(!isset($login)){
			redirect('index.php/login');
		}
	}

	public function index(){
		$this->checkLogin();
		$data['buku'] = $this->Buku->load_data()->result_array();
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/index',$data);
		$this->load->view('layout/bottom');
	}

	public function create(){		
		$this->checkLogin();
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/create');
		$this->load->view('layout/bottom');
	}

	public function edit($id){		
		$this->checkLogin();
		$data['buku'] = $this->Buku->load_one_data($id)->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/edit', $data);
		$this->load->view('layout/bottom');
	}

	public function store(){
		$this->checkLogin();
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

		if($this->Buku->input_data($data,'Buku')){
			echo "Berhasil tambah data buku";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		// $this->session->set_flashdata('message','Berhasil update data buku');
		// redirect(base_url().'index.php/buku','refresh');
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
			echo "Berhasil update data buku";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		// $this->session->set_flashdata('message','Berhasil update data buku');
		// redirect(base_url().'index.php/buku','refresh');
	}

	public function destroy($id){
		$this->checkLogin();
		$where = array('kd_register' => $id);		

		if($this->Buku->hapus_data($where,'Buku')){
			echo "Berhasil hapus data buku";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		// $this->session->set_flashdata('message','Berhasil hapus data buku');
		// redirect(base_url().'index.php/buku','refresh');
	}
}
