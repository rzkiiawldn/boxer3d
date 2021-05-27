<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Berita Boxer3D',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'berita'	=> $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC")->result()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/berita');
		$this->load->view('template/user_footer');
	}
	public function detail($id_berita)
	{
		$data = [
			'judul'		=> 'Detail Berita',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'berita'	=> $this->db->query("SELECT * FROM berita WHERE id_berita = $id_berita")->row()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/detail_berita');
		$this->load->view('template/user_footer');
	}
}