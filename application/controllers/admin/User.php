<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Data User',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_user' => $this->db->get_where('user', ['id_user !=' => 1])->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/user/data_user');
		$this->load->view('template/admin_footer');
	}

	public function data_reseller()
	{
		$data = [
			'judul'		=> 'Data Reseller',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_reseller' => $this->db->get_where('user', ['id_user !=' => 1, 'reseller' => 1])->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/user/data_reseller');
		$this->load->view('template/admin_footer');
	}

	public function data_dropshipper()
	{
		$data = [
			'judul'		=> 'Data Dropshipper',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_dropshipper' => $this->db->get_where('user', ['id_user !=' => 1, 'dropship' => 1])->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/user/data_dropshipper');
		$this->load->view('template/admin_footer');
	}
}