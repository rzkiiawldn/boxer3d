<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function data_transaksi()
	{
		$data = [
			'judul'		=> 'Data Transaksi',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE user.dropship = 0 AND user.reseller = 0 AND pesanan.status != 3")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/transaksi/data_transaksi');
		$this->load->view('template/admin_footer');
	}

	public function data_transaksi_reseller()
	{
		$data = [
			'judul'		=> 'Data Transaksi Reseller',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE user.dropship = 0 AND user.reseller = 1 AND pesanan.status != 3")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/transaksi/data_transaksi_reseller');
		$this->load->view('template/admin_footer');
	}

	public function data_transaksi_dropshipper()
	{
		$data = [
			'judul'		=> 'Data Transaksi Dropshipper',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE user.dropship = 1 AND user.reseller = 0 AND pesanan.status != 3 ")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/transaksi/data_transaksi_dropshipper');
		$this->load->view('template/admin_footer');
	}

	public function riwayat_transaksi()
	{
		$data = [
			'judul'		=> 'Riwayat Transaksi',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user WHERE pesanan.status = 3 ")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/transaksi/riwayat_transaksi');
		$this->load->view('template/admin_footer');
	}

	public function detail($id_pesanan)
	{
		$data = [
			'judul'     => 'Detail Transaksi',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'pesanan'		=> $this->db->query("SELECT * FROM pesanan JOIN pesanan_detail ON pesanan.id_pesanan = pesanan_detail.pesanan_id JOIN user ON user.id_user = pesanan.user_id JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE pesanan.id_pesanan = $id_pesanan ")->row_array(),
			'pesanan_detail'     => $this->db->query("SELECT * FROM pesanan_detail JOIN pesanan ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE pesanan_detail.pesanan_id = $id_pesanan")->result()

		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/transaksi/detail');
		$this->load->view('template/admin_footer');
	}

	public function selesai($id_pesanan)
	{
		$this->db->set('status', $this->input->post('status'));
		$this->db->where('id_pesanan', $id_pesanan);
		$this->db->update('pesanan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan selesai</div>');
		redirect('admin/transaksi/detail/' . $id_pesanan);
	}
}
