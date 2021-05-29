<?php

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function keranjang()
    {
    	$user      		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $pesanan        = $this->db->get_where('pesanan', ['user_id' => $user->id_user, 'status' => 0])->row();
        $pesanan_detail = $this->db->query("SELECT * FROM pesanan_detail JOIN pesanan ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE pesanan_detail.pesanan_id = pesanan.id_pesanan AND pesanan.status = 0 ORDER BY pesanan_detail.id_pesanan_detail DESC")->result();
        $data = [
            'judul'             => 'Keranjang Pesanan',
            'user'				=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pesanan'           => $pesanan,
            'pesanan_detail'    => $pesanan_detail,
        ];

        $this->load->view('template/user_header', $data);
        $this->load->view('user/keranjang');
        $this->load->view('template/user_footer');
    }

    public function batalkan($id)
    {
        $pesanan_detail  = $this->db->get_where('pesanan_detail', ['id_pesanan_detail' => $id])->row();
        $pesanan         = $this->db->get_where('pesanan', ['id_pesanan' => $pesanan_detail->pesanan_id])->row();
        $this->db->set('total_harga', $pesanan->total_harga - $pesanan_detail->jumlah_harga);
        $this->db->where('id_pesanan', $pesanan_detail->pesanan_id);
        $this->db->update('pesanan');

        $this->db->where('id_pesanan_detail', $id);
        $this->db->delete('pesanan_detail');

        redirect('user/pesanan/keranjang');
    }

    public function konfirmasi()
    {
    	$user      			= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $pesanan            = $this->db->get_where('pesanan', ['user_id' => $user->id_user, 'status' => 0])->row();

        $this->db->set('status', 1);
        $this->db->set('no_tlp_pesanan', $this->input->post('no_tlp_pesanan'));
        $this->db->set('alamat_pesanan', $this->input->post('alamat_pesanan'));
        $this->db->set('kecamatan_pesanan', $this->input->post('kecamatan_pesanan'));
        $this->db->set('kode_pos_pesanan', $this->input->post('kode_pos_pesanan'));
        $this->db->where('id_pesanan', $pesanan->id_pesanan);
        $this->db->update('pesanan');

        $pesanan_detail    = $this->db->get_where('pesanan_detail', ['pesanan_id' => $pesanan->id_pesanan])->result();
        foreach ($pesanan_detail as $row) {
            $barang = $this->db->get_where('barang', ['id_barang' => $row->barang_id])->row();
            $this->db->set('stok_barang', $barang->stok_barang - $row->jumlah_barang);
            $this->db->where('id_barang', $barang->id_barang);
            $this->db->update('barang');

            redirect('user/pesanan/riwayat_pesanan');
        }
    }

    public function riwayat_pesanan()
    {
        $user               = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $data = [
            'judul'         => 'Riwayat pesanan',
            'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pesanan'       => $this->db->get_where('pesanan', ['user_id' => $user->id_user, 'status !=' => 0])->result(),
        ];

        $this->load->view('template/user_header', $data);
        $this->load->view('user/riwayat');
        $this->load->view('template/user_footer');
    }

    public function detail_pesanan($id_pesanan)
    {
        $user               = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $pesanan            = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row();
        $pesanan_detail     = $this->db->query("SELECT * FROM pesanan_detail JOIN pesanan ON pesanan_detail.pesanan_id = pesanan.id_pesanan JOIN barang ON pesanan_detail.barang_id = barang.id_barang WHERE pesanan_detail.pesanan_id = $id_pesanan")->result();

        $data = [
            'judul'             => 'Detail Pesanan',
            'user'				=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'data_pesanan'      => $this->db->get_where('pesanan', ['user_id' => $user->id_user])->result(),
            'pesanan'           => $pesanan,
            'pesanan_detail'    => $pesanan_detail
        ];
        $this->load->view('template/user_header', $data);
        $this->load->view('user/detail_pesanan');
        $this->load->view('template/user_footer');
    }

    public function upload_bukti($id_pesanan)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $pesanan = $this->db->get_where('pesanan', [
            'user_id' => $user->id_user,
            'id_pesanan' => $id_pesanan
        ])->row();
        // end

        $bukti_pembayaran = $_FILES['bukti_pembayaran'];
        if ($bukti_pembayaran = '') {
        } else {
            $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
            $config['max_size']         = '2048';
            $config['upload_path']      = './assets/bukti_pembayaran/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                $old_gambar         = $pesanan->bukti_pembayaran;
                if ($old_gambar     != 'default.jpg') {
                    unlink(FCPATH . 'assets/bukti_pembayaran/' . $old_gambar);
                }
                $bukti_pembayaran   = $this->upload->data('file_name');
                $this->db->set('bukti_pembayaran', $bukti_pembayaran);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Upload bukti gagal, silahkan cek file yang anda masukan</div>');
                redirect('user/pesanan/riwayat_pesanan');
            }
        }
        $this->db->set('status', 2);
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->update('pesanan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Upload bukti berhasil, pesanan segera diproses</div>');
        redirect('user/pesanan/riwayat_pesanan');
    }
}
