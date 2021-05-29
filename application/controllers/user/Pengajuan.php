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
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
		$data = [
			'judul'		=> 'Pengajuan Reseller',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pengajuan' => $this->db->query("SELECT * FROM pengajuan JOIN user ON pengajuan.user_id = user.id_user WHERE role_id = 2 AND user_id = $user->id_user AND user.reseller = 0")->row(),
            'syarat'    => $this->db->get_where('syarat', ['role_id' => 3])->result()
		];

			$this->load->view('template/user_header', $data);
			$this->load->view('user/pengajuan/reseller');
			$this->load->view('template/user_footer');
	}

    public function ajukan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $foto_bukti = $_FILES['foto_bukti'];
        if ($foto_bukti = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/pengajuan_reseller/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_bukti')) {
                $foto_bukti   = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto_bukti gagal, silahkan cek file yang anda masukan</div>');
                redirect('user/pengajuan/pengajuan_reseller');
            }
        }
        $data = [
            'user_id'           => $user['id_user'],
            'role_id'           => 2,
            'status_pengajuan'  => 'proses',
            'foto_bukti'        => $foto_bukti
        ];
        $this->db->insert('pengajuan', $data);
        redirect('user/pengajuan/pengajuan_reseller');
    }

	public function pengajuan_dropshipper()
	{
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $data = [
            'judul'     => 'Pengajuan Dropshipper',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pengajuan' => $this->db->query("SELECT * FROM pengajuan JOIN user ON pengajuan.user_id = user.id_user WHERE role_id = 1 AND user_id = $user->id_user AND user.dropship = 0")->row(),
            'syarat'    => $this->db->get_where('syarat', ['role_id' => 3])->result()
        ];

			$this->load->view('template/user_header', $data);
			$this->load->view('user/pengajuan/dropshipper');
			$this->load->view('template/user_footer');
	}

    public function ajukan_dropship()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $foto_bukti = $_FILES['foto_bukti'];
        if ($foto_bukti = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/pengajuan_dropshipper/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_bukti')) {
                $foto_bukti   = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto_bukti gagal, silahkan cek file yang anda masukan</div>');
                redirect('user/pengajuan/pengajuan_dropshipper');
            }
        }
        $data = [
            'user_id'           => $user['id_user'],
            'role_id'           => 1,
            'status_pengajuan'  => 'proses',
            'foto_bukti'        => $foto_bukti
        ];
        $this->db->insert('pengajuan', $data);
        redirect('user/pengajuan/pengajuan_dropshipper');
    }
}