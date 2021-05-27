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
			'judul'		=> 'Halaman User',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('template/header', $data);
		$this->load->view('user/index');
		$this->load->view('template/footer');
	}

	public function edit_profile()
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => 'Nama tidak boleh kosong'
		]);
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|trim', [
			'required' => 'No Telepon tidak boleh kosong'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim', [
			'required' => 'Alamat tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'trim|min_length[4]|matches[password2]', [
			'min_length' => 'password terlalu lemah',
			'matches'    => 'password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$nama 		= htmlspecialchars($this->input->post('nama', TRUE));
			$email 		= htmlspecialchars($this->input->post('email', TRUE));
			$no_hp 		= htmlspecialchars($this->input->post('no_hp', TRUE));
			$alamat 	= htmlspecialchars($this->input->post('alamat', TRUE));
			$password 	= password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			// foto
			$foto = $_FILES['foto_user']['name'];

			if ($foto) {
				$config['allowed_types']	= 'gif|png|jpg|PNG|JPEG|jpeg';
				$config['max_size']			= '2048';
				$config['upload_path']		= './assets/img/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto_user')) {

					$old_foto = $user['foto_user'];

					if ($old_foto != 'default.jpg') {
						unlink(FCPATH . 'assets/img/' . $old_foto);
					}

					$new_foto = $this->upload->data('file_name');
					$this->db->set('foto_user', $new_foto);
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Edit foto gagal, silahkan cek kembali foto yang anda masukan</div>');
					redirect('user/index');
				}
			}


			$this->db->set('nama', $nama);
			$this->db->set('no_hp', $no_hp);
			$this->db->set('alamat', $alamat);
			if (!empty($password)) {
				$this->db->set('password', $password);
			}
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat profil berhasil diubah</div>');
			redirect('user/index');
		}
	}
}
