<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'My Profile',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon', 'required|trim', [
            'required' => 'Nomor Telepon tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim', [
            'required' => 'kecamatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim', [
            'required' => 'Kode Pos tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
			$this->load->view('template/user_header', $data);
			$this->load->view('user/profile');
			$this->load->view('template/user_footer');
        } else {
            $nama           = $this->input->post('nama');
            $email          = $this->input->post('email');
            $no_tlp         = $this->input->post('no_tlp');
            $alamat         = $this->input->post('alamat');
            $kecamatan      = $this->input->post('kecamatan');
            $kode_pos       = $this->input->post('kode_pos');
			$password 	    = $this->input->post('password');

            $this->db->set('nama', $nama);
            $this->db->set('no_tlp', $no_tlp);
            $this->db->set('alamat', $alamat);
            $this->db->set('kecamatan', $kecamatan);
            $this->db->set('kode_pos', $kode_pos);
            if (!empty($password)) {
				$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
			}
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil diubah</div>');
            redirect('user/profile');
        }
	}
}