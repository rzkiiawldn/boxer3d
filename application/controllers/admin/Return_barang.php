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
			'return_barang' => $this->db->query("SELECT * FROM return_barang JOIN user ON return_barang.user_id = user.id_user")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/return_barang/index');
		$this->load->view('template/admin_footer');
	}

	public function terima($id_return)
	{
		$user = $this->db->get_where('return_barang', ['id_return' => $id_return])->row();
		$this->db->set('status_return', 'terima');
		$this->db->where('id_return', $id_return);
		$this->db->update('return_barang');
		redirect('admin/return_barang');
	}	

	public function tolak($id_return)
	{
		$user = $this->db->get_where('return_barang', ['id_return' => $id_return])->row();
		$this->db->set('status_return', 'tolak');
		$this->db->where('id_return', $id_return);
		$this->db->update('return_barang');
		redirect('admin/return_barang');
	}

	public function detail($id_return)
	{
		$data = [
			'judul'		=> 'Detail Return Barang',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'return' => $this->db->query("SELECT * FROM return_barang JOIN user ON return_barang.user_id = user.id_user WHERE id_return = $id_return")->row_array()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/return_barang/detail');
		$this->load->view('template/admin_footer');
	}
}