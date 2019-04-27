<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Anggota');
		$this->load->helper('url');
	}	

	public $folder = 'anggota';

	public function index(){
		$data['anggota'] = $this->Anggota->load_data()->result_array();
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/index',$data);
		$this->load->view('layout/bottom');
	}

	public function create(){		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/create');
		$this->load->view('layout/bottom');
	}

	public function edit($id){		
		$data['buku'] = $this->Anggota->load_one_data($id)->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/edit', $data);
		$this->load->view('layout/bottom');
	}

	public function store(){
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

		$this->Anggota->input_data($data,'Anggota');	
		redirect(base_url().'index.php/anggota','refresh');
	}

	public function update(){
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

		$this->Anggota->update_data($data,'Anggota',$where);	
		redirect(base_url().'index.php/anggota','refresh');
	}

	public function destroy($id){
		$where = array('kd_anggota' => $id);
		$this->Anggota->hapus_data($where,'Anggota');		
		redirect(base_url().'index.php/anggota','refresh');
	}
}
