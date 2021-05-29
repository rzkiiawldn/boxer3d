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

	public function detail($id_user)
	{
		$data = [
			'judul'				=> 'Detail',
			'user'      		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_user' 		=> $this->db->get_where('user', ['id_user' => $id_user])->row_array()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/user/detail');
		$this->load->view('template/admin_footer');
	}

	public function edit_user($id_user)
	{
		$data = [
			'judul'				=> 'Edit',
			'user'      		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_user' 		=> $this->db->get_where('user', ['id_user' => $id_user])->row()
		];

		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
		$this->form_validation->set_rules('kode_pos', 'kode_pos', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|trim');
		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'trim|min_length[4]', [
			'min_length' => 'password terlalu lemah',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('template/admin_header', $data);
			$this->load->view('admin/user/edit');
			$this->load->view('template/admin_footer');
		} else {
			$id_user 	= htmlspecialchars($this->input->post('id_user', TRUE));
			$password 	= $this->input->post('password1');
			$nama 	= $this->input->post('nama');
			$email 	= $this->input->post('email');
			$no_tlp 	= $this->input->post('no_tlp');
			$alamat 	= $this->input->post('alamat');
			$kecamatan 	= $this->input->post('kecamatan');
			$kode_pos 	= $this->input->post('kode_pos');
			$email 	= $this->input->post('email');

			$this->db->set('nama', $nama);
			$this->db->set('email', $email);
			$this->db->set('no_tlp', $no_tlp);
			$this->db->set('alamat', $alamat);
			$this->db->set('kecamatan', $kecamatan);
			$this->db->set('kode_pos', $kode_pos);
			if (!empty($password)) {
				$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
			}
			$this->db->where('id_user', $id_user);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat data user berhasil diubah</div>');
			redirect('admin/user');
		}
	}

	public function hapus_user($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
		redirect('admin/user');
	}
}