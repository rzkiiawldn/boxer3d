<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_boxer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$data = [
			'judul'		=> 'Data Boxer',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'barang'	=> $this->db->get('barang')->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/boxer/data_boxer');
		$this->load->view('template/admin_footer');
	}

	public function tambah_motif()
	{
		$this->form_validation->set_rules('nama_motif', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required|trim');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
		$data = [
			'judul'		=> 'Tambah Motif',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/boxer/tambah');
		$this->load->view('template/admin_footer');
		 } else {

            $foto_barang = $_FILES['foto_barang'];
            if ($foto_barang = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_barang')) {
                    $foto_barang   = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah Foto_barang gagal, silahkan cek file yang anda masukan</div>');
                    redirect('admin/data_boxer');
                }
            }
            $data_barang = [
                'nama_motif'       	=> $this->input->post('nama_motif'),
                'harga_barang'      => $this->input->post('harga_barang'),
                'stok_barang'      	=> $this->input->post('stok_barang'),
                'foto_barang'       => $foto_barang
            ];
            $this->db->insert('barang', $data_barang);
            redirect('admin/data_boxer');
        }
	}


	public function edit_motif($id_barang)
    {
        $data = [
            'judul'     => 'Data Barang',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'barang'	=> $this->db->get_where('barang', ['id_barang' => $id_barang])->row()
        ];
        $this->form_validation->set_rules('nama_motif', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required|trim');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('admin/boxer/edit');
            $this->load->view('template/admin_footer');
        } else {
            $nama_motif      = $this->input->post('nama_motif');
            $harga_barang    = $this->input->post('harga_barang');
            $stok_barang     = $this->input->post('stok_barang');
            $foto_barang = $_FILES['foto_barang'];
            if ($foto_barang = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_barang')) {
                    $old_gambar         = $data['barang']->foto_barang;
                    if ($old_gambar     != 'default.jpg') {
                        unlink(FCPATH . 'assets/barang/' . $old_gambar);
                    }
                    $foto_barang   = $this->upload->data('file_name');
                    $this->db->set('foto_barang', $foto_barang);
                } else {
                    $this->db->set('nama_motif', $nama_motif);
                    $this->db->set('harga_barang', $harga_barang);
                    $this->db->set('stok_barang', $stok_barang);
                    $this->db->where('id_barang', $id_barang);
                    $this->db->update('barang');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data barang berhasil</div>');
                    redirect('admin/data_boxer');
                }
            }
            $this->db->set('nama_motif', $nama_motif);
            $this->db->set('harga_barang', $harga_barang);
            $this->db->set('stok_barang', $stok_barang);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data barang berhasil</div>');
            redirect('admin/data_boxer');
        }
    }

     public function hapus_motif($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data barang</div>');
        redirect('admin/data_boxer');
    }
}