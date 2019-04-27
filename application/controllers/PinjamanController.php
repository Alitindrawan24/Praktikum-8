<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamanController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->model('Pinjaman');
		$this->load->helper('url');
	}	

	public $folder = 'pinjaman';

	public function index(){
		$data['pinjaman'] = $this->Pinjaman->load_data()->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/index',$data);
		$this->load->view('layout/bottom');
	}

	public function create(){		
		$data['anggota'] = $this->Pinjaman->load_anggota()->result_array();
		$data['petugas'] = $this->Pinjaman->load_petugas()->result_array();
		$data['buku'] = $this->Pinjaman->load_buku()->result_array();
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/create',$data);
		$this->load->view('layout/bottom');
	}

	public function edit($id){		
		$data['pinjaman'] = $this->Pinjaman->load_one_data($id)->result_array();		
		$this->load->view('layout/top');
		$this->load->view($this->folder.'/edit', $data);
		$this->load->view('layout/bottom');
	}

	public function store(){
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

			$this->Pinjaman->input_data2($data2, 'detail_pinjam');			
		}		



		redirect(base_url().'index.php/pinjaman','refresh');
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
		$where = array('id_pinjam' => $id);
		$this->Pinjaman->hapus_data($where,'Pinjaman');		
		redirect(base_url().'index.php/pinjaman','refresh');
	}
}
