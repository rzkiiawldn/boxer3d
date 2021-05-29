<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Return_barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index()
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
		$data = [
			'judul'		=> 'Return Barang',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'return_barang' => $this->db->get_where("return_barang", ['user_id' => $user->id_user])->result(),
			'syarat'	=> $this->db->get_where('syarat', ['role_id' => 3])->result()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/return');
		$this->load->view('template/user_footer');
	}

    public function detail_return($id_return)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $data = [
            'judul'     => 'Detail Return Barang',
            'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'return'    => $this->db->query("SELECT * FROM return_barang JOIN user ON return_barang.user_id = user.id_user WHERE user_id = $user->id_user AND id_return = $id_return ")->row()
        ];
        $this->load->view('template/user_header', $data);
        $this->load->view('user/detail_return');
        $this->load->view('template/user_footer');
    }

	public function ajukan()
	{
		$data = [
			'judul'		=> 'Form Return Barang',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->form_validation->set_rules('alasan_return', 'Alasan Return', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
		$this->load->view('template/user_header', $data);
		$this->load->view('user/return_barang');
		$this->load->view('template/user_footer');
		 } else {

            $video = $_FILES['video'];
            if ($video = '') {
            } else {
                $config['allowed_types']    = 'mp4|MP4|GIF|gif|mkv|MKV';
                $config['max_size']         = '204800';
                $config['upload_path']      = './assets/return_barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('video')) {
                    $video   = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tambah video gagal, silahkan cek file yang anda masukan</div>');
                    redirect('user/return_barang/ajukan');
                }
            }
            $data = [
            	'tanggal_return' => date('Y-m-d'),
                'user_id'		=> $data['user']['id_user'],
                'alasan_return' => $this->input->post('alasan_return'),
                'video'         => $video,
                'status_return' => 'proses',
                'rekening'		=> '',
                'foto_resi'		=> '',
                'alamat_pengembalian'		=> '',
            ];
            $this->db->insert('return_barang', $data);
            redirect('user/return_barang');
        }
	}

	public function upload_resi($id_return)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $return_barang = $this->db->get_where('return_barang', [
            'user_id' => $user->id_user,
            'id_return' => $id_return
        ])->row();
        // end

        $foto_resi = $_FILES['foto_resi'];
        if ($foto_resi = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/foto_resi/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_resi')) {
                $old_gambar         = $return_barang->foto_resi;
                if ($old_gambar     != 'default.jpg') {
                    unlink(FCPATH . 'assets/foto_resi/' . $old_gambar);
                }
                $foto_resi   = $this->upload->data('file_name');
                $this->db->set('foto_resi', $foto_resi);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Upload resi gagal, silahkan cek file yang anda masukan</div>');
                redirect('user/return_barang');
            }
        }
        $this->db->set('nama_bank', $this->input->post('nama_bank'));
        $this->db->set('rekening', $this->input->post('rekening'));
        $this->db->set('alamat_pengembalian', $this->input->post('alamat_pengembalian'));
        $this->db->where('id_return', $id_return);
        $this->db->update('return_barang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Upload resi berhasil, return_barang segera diproses</div>');
        redirect('user/return_barang');
    }
}