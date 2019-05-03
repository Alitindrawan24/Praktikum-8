<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}	

	public $folder = 'login';


	public function index(){
		$login = $this->session->userdata('login');
		if(isset($login)){
			redirect(base_url().'index.php/anggota','refresh');
		}
		$this->load->view($this->folder.'/index');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$a = $this->db->get_where('petugas', ['username' => $username])->row_array();
		$b = $this->db->get_where('petugas', ['password' => $password])->row_array();

		if($a && $b){			
			$data = ['username' => $a['username'], 'id' => $a['kd_petugas'], 'login' => true];
			$this->session->set_userdata($data);

			$this->db->where(['kd_petugas' => $a['kd_petugas']]);
			$this->db->update('petugas', ['last_login' => date('Y-m-d H:i:s')]);

			redirect(base_url().'index.php/anggota','refresh');
		}
		else{
			$this->session->set_flashdata('message','Login gagal');
			redirect(base_url().'index.php/login','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'index.php/login','refresh');
	}
	
}