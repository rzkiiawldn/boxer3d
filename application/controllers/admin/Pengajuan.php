<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function pengajuan_reseller()
	{
		$data = [
			'judul'		=> 'Pengajuan Reseller',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'reseller'	=> $this->db->query("SELECT * FROM pengajuan JOIN role ON pengajuan.role_id = role.id_role JOIN user ON pengajuan.user_id = user.id_user WHERE pengajuan.status_pengajuan != 'terima' AND pengajuan.role_id = 2")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/pengajuan/pengajuan_reseller');
		$this->load->view('template/admin_footer');
	}

	public function pengajuan_dropshipper()
	{
		$data = [
			'judul'		=> 'Pengajuan Dropshipper',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'dropshipper'	=> $this->db->query("SELECT * FROM pengajuan JOIN role ON pengajuan.role_id = role.id_role JOIN user ON pengajuan.user_id = user.id_user WHERE pengajuan.status_pengajuan != 'terima' AND pengajuan.role_id = 1")->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/pengajuan/pengajuan_dropshipper');
		$this->load->view('template/admin_footer');
	}

	public function terima_dropshipper($id_pengajuan)
	{
		$user = $this->db->get_where('pengajuan', ['id_pengajuan' => $id_pengajuan])->row();
		$this->db->set('status_pengajuan', 'terima');
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan');

		$this->db->set('dropship', 1);
		$this->db->where('id_user', $user->user_id);
		$this->db->update('user');

		redirect('admin/pengajuan/pengajuan_dropshipper');
	}	

	public function tolak_dropshipper($id_pengajuan)
	{
		$user = $this->db->get_where('pengajuan', ['id_pengajuan' => $id_pengajuan])->row();
		$this->db->set('status_pengajuan', 'tolak');
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan');

		redirect('admin/pengajuan/pengajuan_dropshipper');
	}

	public function terima_reseller($id_pengajuan)
	{
		$user = $this->db->get_where('pengajuan', ['id_pengajuan' => $id_pengajuan])->row();
		$this->db->set('status_pengajuan', 'terima');
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan');

		$this->db->set('reseller', 1);
		$this->db->where('id_user', $user->user_id);
		$this->db->update('user');

		redirect('admin/pengajuan/pengajuan_reseller');
	}

	public function tolak_reseller($id_pengajuan)
	{
		$user = $this->db->get_where('pengajuan', ['id_pengajuan' => $id_pengajuan])->row();
		$this->db->set('status_pengajuan', 'tolak');
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan');

		redirect('admin/pengajuan/pengajuan_reseller');
	}
}