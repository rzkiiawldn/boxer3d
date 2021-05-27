<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Riwayat Pembelian',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/riwayat');
		$this->load->view('template/user_footer');
	}
}