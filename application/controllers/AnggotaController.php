<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Anggota');
		$this->load->helper('url');
		$this->load->library('session');
	}	

	public $folder = 'anggota';

	public function checkLogin(){
		$login = $this->session->userdata('login');
		if(!isset($login)){
			redirect('index.php/login');
		}
	}

	public function index(){
		$this->checkLogin();
		$data['anggota'] = $this->Anggota->load_data()->result_array();
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
		$data['buku'] = $this->Anggota->load_one_data($id)->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/edit', $data);
		$this->load->view('layout/bottom');
	}

	public function store(){
		$this->checkLogin();
		$nama = $this->input->post('nama');
		$prodi = $this->input->post('prodi');
		$jenjang = $this->input->post('jenjang');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama' => $nama,
			'prodi' => $prodi,
			'jenjang' => $jenjang,
			'alamat' => $alamat
		);	
				
		if($this->Anggota->input_data($data,'Anggota')){
			echo "Berhasil tambah data anggota";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}
		//$this->session->set_flashdata('message','Berhasil tambah data anggota');
		//redirect(base_url().'index.php/anggota','refresh');
	}

	public function update(){
		$this->checkLogin();
		$id = $this->input->post('kd_anggota');
		$nama = $this->input->post('nama');
		$prodi = $this->input->post('prodi');
		$jenjang = $this->input->post('jenjang');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama' => $nama,
			'prodi' => $prodi,
			'jenjang' => $jenjang,
			'alamat' => $alamat
		);

		$where = array(
			'kd_anggota' => $id
		);		

		if($this->Anggota->update_data($data,'Anggota',$where)){
			echo "Berhasil update data anggota";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}
		// $this->session->set_flashdata('message','Berhasil update data anggota');
		// redirect(base_url().'index.php/anggota','refresh');
	}

	public function destroy($id){
		$this->checkLogin();
		$where = array('kd_anggota' => $id);		

		if($this->Anggota->hapus_data($where,'Anggota')){
			echo "Berhasil hapus data anggota";
		}
		else{
			$error = $this->db->error();
			echo $error['message'];
		}

		//$this->session->set_flashdata('message','Berhasil hapus data anggota');
		//redirect(base_url().'index.php/anggota','refresh');
	}
}
