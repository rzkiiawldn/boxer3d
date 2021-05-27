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
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user JOIN pesanan_detail ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE user.dropship = 0 AND user.reseller = 0 AND pesanan.status != 2")->result()
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
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user JOIN pesanan_detail ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE user.dropship = 0 AND user.reseller = 1 AND pesanan.status != 2")->result()
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
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user JOIN pesanan_detail ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE user.dropship = 1 AND user.reseller = 0 AND pesanan.status != 2 ")->result()
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
			'pesanan'	=> $this->db->query("SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.id_user JOIN pesanan_detail ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE pesanan.status = 2 ")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/transaksi/riwayat_transaksi');
		$this->load->view('template/admin_footer');
	}
}