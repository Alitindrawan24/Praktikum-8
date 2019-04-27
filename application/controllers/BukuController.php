<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Buku');
		$this->load->helper('url');
	}	

	public $folder = 'buku';

	public function index(){
		$data['buku'] = $this->Buku->load_data()->result_array();
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
		$data['buku'] = $this->Buku->load_one_data($id)->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/edit', $data);
		$this->load->view('layout/bottom');
	}

	public function store(){
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

		$this->Buku->input_data($data,'Buku');	
		redirect(base_url().'index.php/buku','refresh');
	}

	public function update(){
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

		$this->Buku->update_data($data,'Buku',$where);	
		redirect(base_url().'index.php/buku','refresh');
	}

	public function destroy($id){
		$where = array('kd_register' => $id);
		$this->Buku->hapus_data($where,'Buku');		
		redirect(base_url().'index.php/buku','refresh');
	}
}
