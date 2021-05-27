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
			'judul'		=> 'Berita',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'berita'	=> $this->db->get('berita')->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/berita/data_berita');
		$this->load->view('template/admin_footer');
	}

	public function tambah_berita()
	{
		$data = [
			'judul'		=> 'Tambah berita',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->form_validation->set_rules('judul_berita', 'Judul berita', 'required|trim');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/berita/tambah');
		$this->load->view('template/admin_footer');
		 } else {

            $foto_berita = $_FILES['foto_berita'];
            if ($foto_berita = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/berita/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_berita')) {
                    $foto_berita   = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto_berita gagal, silahkan cek file yang anda masukan</div>');
                    redirect('admin/berita');
                }
            }
            $data = [
                'judul_berita'      => $this->input->post('judul_berita'),
                'isi_berita'      	=> $this->input->post('isi_berita'),
                'tanggal_input'		=> date('Y-m-d'),
                'pengirim'      	=> $data['user']['nama'],
                'view'      		=> 0,
                'foto_berita'       => $foto_berita
            ];
            $this->db->insert('berita', $data);
            redirect('admin/berita/index');
        }
	}

	public function edit_berita($id_berita)
    {
        $data = [
            'judul'     => 'Edit Berita',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'berita'	=> $this->db->get_where('berita', ['id_berita' => $id_berita])->row()
        ];
        $this->form_validation->set_rules('judul_berita', 'Judul berita', 'required|trim');
        $this->form_validation->set_rules('isi_berita', 'Isi berita', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('admin/berita/edit');
            $this->load->view('template/admin_footer');
        } else {
            $judul_berita      	= $this->input->post('judul_berita');
            $isi_berita    		= $this->input->post('isi_berita');
            $id_berita     		= $this->input->post('id_berita');
            $foto_berita = $_FILES['foto_berita'];
            if ($foto_berita = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/berita/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_berita')) {
                    $old_gambar         = $data['berita']->foto_berita;
                    if ($old_gambar     != 'default.jpg') {
                        unlink(FCPATH . 'assets/berita/' . $old_gambar);
                    }
                    $foto_berita   = $this->upload->data('file_name');
                    $this->db->set('foto_berita', $foto_berita);
                } else {
                    $this->db->set('judul_berita', $judul_berita);
                    $this->db->set('isi_berita', $isi_berita);
                    $this->db->where('id_berita', $id_berita);
                    $this->db->update('berita');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data berita berhasil</div>');
                    redirect('admin/berita');
                }
            }
            $this->db->set('judul_berita', $judul_berita);
            $this->db->set('isi_berita', $isi_berita);
            $this->db->where('id_berita', $id_berita);
            $this->db->update('berita');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data berita berhasil</div>');
            redirect('admin/berita');
        }
    }

     public function hapus_berita($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('berita');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data berita</div>');
        redirect('admin/berita');
    }
}