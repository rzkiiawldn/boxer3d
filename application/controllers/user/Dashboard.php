<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Dashboard',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'barang'	=> $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC")->result(),
			'about'		=> $this->db->get('about')->result()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/dashboard');
		$this->load->view('template/user_footer');
	}
}