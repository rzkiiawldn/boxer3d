<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('contoh_model');
    }

    // READ
    public function index()
    {
        $data = [
            'judul'     => '',
            'table'     => $this->Contoh_model->get()->result_array()
        ];
        $this->load->view('', $data);
    }

    // CREATE
    public function tambah()
    {
        $this->form_validation->set_rules('name', 'alias', 'validasi');
        if ($this->form_validation->run() == false) {
            $this->index(); #kembali ke index
        } else {
            // olah data
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['allowed_types']    = 'gif|png|jpg|PNG|JPEG|jpeg';
                $config['max_size']         = '2048';
                $config['upload_path']      = './penyimpanan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Edit foto gagal, silahkan cek kembali foto yang anda masukan</div>');
                    redirect('controller');
                }
            }
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', TRUE)),
                'foto'          => htmlspecialchars($this->input->post('foto', TRUE)),
            ];
            // kirimkan data ke model
            $this->Contoh_model->add($data);
            // pesan dengan flash_data
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil</div>');
            redirect('controller');
        }
    }

    // UPDATE
    public function edit($id)
    {
        $table = $this->Contoh_model->get($id)->row();
        $this->form_validation->set_rules('name', 'alias', 'validasi');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $nama         = htmlspecialchars($this->input->post('nama', TRUE));
            // foto
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['allowed_types']    = 'gif|png|jpg|PNG|JPEG|jpeg';
                $config['max_size']         = '2048';
                $config['upload_path']      = './penyimpanan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $old_foto = $data['foto']; # query tabel yg ingin kita ubah fotonya, lalu tampilkan disini

                    if ($old_foto != 'default.jpg') {
                        unlink(FCPATH . 'penyimpanan/' . $old_foto);
                    }

                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Edit foto gagal, silahkan cek kembali foto yang anda masukan</div>');
                    redirect('controller');
                }
            }


            $this->db->set('nama', $nama);
            $this->db->where('id', $id);
            $this->Contoh_model->edit();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">berhasil</div>');
            redirect('controller');
        }
    }

    // DELETE
    public function hapus($id)
    {
        $this->Contoh_model->delete($id);
    }
}
