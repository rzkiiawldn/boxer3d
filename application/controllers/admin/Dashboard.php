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
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('template/admin_footer');
	}
}