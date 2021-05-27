<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Return_barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Return Barang',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/return');
		$this->load->view('template/user_footer');
	}

	public function ajukan()
	{
		$data = [
			'judul'		=> 'Form Return Barang',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/return_barang');
		$this->load->view('template/user_footer');
	}
}