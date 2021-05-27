<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Event',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'event'		=> $this->db->get('event')->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/event/data_event');
		$this->load->view('template/admin_footer');
	}

	public function tambah_event()
	{
		$data = [
			'judul'		=> 'Tambah event',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->form_validation->set_rules('deskripsi_event', 'Deskripsi event', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/event/tambah');
		$this->load->view('template/admin_footer');
		 } else {

            $foto_event = $_FILES['foto_event'];
            if ($foto_event = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/event/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_event')) {
                    $foto_event   = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah foto_event gagal, silahkan cek file yang anda masukan</div>');
                    redirect('admin/event');
                }
            }
            $data = [
                'foto_event'       	=> $foto_event,
                'deskripsi_event'   => $this->input->post('deskripsi_event'),
                'tanggal_akhir'		=> $this->input->post('tanggal_akhir')
            ];
            $this->db->insert('event', $data);
            redirect('admin/event/index');
        }
	}

	public function edit_event($id_event)
    {
        $data = [
            'judul'     => 'Edit event',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'event'		=> $this->db->get_where('event', ['id_event' => $id_event])->row()
        ];
        $this->form_validation->set_rules('deskripsi_event', 'Deskripsi event', 'required|trim');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Berakhir', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('admin/event/edit');
            $this->load->view('template/admin_footer');
        } else {
            $deskripsi_event      	= $this->input->post('deskripsi_event');
            $tanggal_akhir    		= $this->input->post('tanggal_akhir');
            $id_event     		    = $this->input->post('id_event');
            $foto_event = $_FILES['foto_event'];
            if ($foto_event = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/event/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_event')) {
                    $old_gambar         = $data['event']->foto_event;
                    if ($old_gambar     != 'default.jpg') {
                        unlink(FCPATH . 'assets/event/' . $old_gambar);
                    }
                    $foto_event   = $this->upload->data('file_name');
                    $this->db->set('foto_event', $foto_event);
                } else {
                    $this->db->set('deskripsi_event', $deskripsi_event);
                    $this->db->set('tanggal_akhir', $tanggal_akhir);
                    $this->db->where('id_event', $id_event);
                    $this->db->update('event');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data event berhasil</div>');
                    redirect('admin/event');
                }
            }
            $this->db->set('deskripsi_event', $deskripsi_event);
            $this->db->set('tanggal_akhir', $tanggal_akhir);
            $this->db->where('id_event', $id_event);
            $this->db->update('event');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data event berhasil</div>');
            redirect('admin/event');
        }
    }

     public function hapus_event($id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->delete('event');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data event</div>');
        redirect('admin/event');
    }
}