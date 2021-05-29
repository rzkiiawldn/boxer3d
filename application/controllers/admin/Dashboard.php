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
			'total_user' => $this->db->get_where('user', ['role !=' => 'admin'])->num_rows(),
			'total_reseller' => $this->db->get_where('user', ['reseller' => 1])->num_rows(),
			'total_dropshipper' => $this->db->get_where('user', ['dropship' => 1])->num_rows(),
			'total_transaksi'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE user.dropship = 0 AND user.reseller = 0 AND pesanan.status != 2")->num_rows(),
			'total_transaksi_reseller' => $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE user.dropship = 0 AND user.reseller = 1 AND pesanan.status != 2")->num_rows(),
			'total_transaksi_dropshipper' => $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE user.dropship = 1 AND user.reseller = 0 AND pesanan.status != 2 ")->num_rows(),
			'total_return' => $this->db->get('return_barang')->num_rows(),
			'about'		=> $this->db->get('about')->row()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('template/admin_footer');
	}

	public function about()
	{
		$this->db->set('about', $this->input->post('about'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->where('id_about', $this->input->post('id_about'));
		$this->db->update('about');
		redirect('admin/dashboard');
	}
}
