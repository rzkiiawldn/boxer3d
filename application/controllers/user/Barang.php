<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function index($id_barang)
	{
		$data = [
			'judul'		=> 'Detail Barang',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'barang'	=> $this->db->query("SELECT * FROM barang WHERE id_barang = $id_barang")->row()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/detail_barang');
		$this->load->view('template/user_footer');
	}

	public function pesan($id_barang)
    {
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $this->index($id_barang);
        } else {
        	$user      		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
            $barang         = $this->db->get_where('barang', ['id_barang' => $id_barang])->row();
            $id_barang      = $this->input->post('id_barang');
            $jumlah_barang  = $this->input->post('jumlah_barang');



            $cek_pesanan = $this->db->get_where('pesanan', ['user_id' => $user->id_user, 'status' => 0])->row();

            if (empty($cek_pesanan)) {
                $data = [
                    'user_id'           => $user->id_user,
                    'tanggal_pesanan'   => date('Y-m-d'),
                    'status'    		=> 0,
                    'kode_bayar'      	=> mt_rand(100, 499),
                    'total_harga'      	=> 0,
                    'total_pesanan'     => 0,
                ];
                $this->db->insert('pesanan', $data);
            }

            $pesanan_baru = $this->db->get_where('pesanan', ['user_id' => $user->id_user, 'status' => 0])->row();
            $cek_pesanan_detail = $this->db->get_where('pesanan_detail', ['barang_id' => $barang->id_barang, 'pesanan_id' => $pesanan_baru->id_pesanan])->row();

 

                if (empty($cek_pesanan_detail)) {
                    $data = [
                        'barang_id'     => $barang->id_barang,
                        'pesanan_id'    => $pesanan_baru->id_pesanan,
                        'jumlah_barang' => $jumlah_barang,
                        'jumlah_harga'  => $barang->harga_barang * $jumlah_barang
                    ];
                    $this->db->insert('pesanan_detail', $data);
                } else {
                    $pesanan_detail         = $this->db->get_where('pesanan_detail', ['barang_id' => $barang->id_barang, 'pesanan_id' => $pesanan_baru->id_pesanan])->row();
                    $this->db->set('jumlah_barang', $pesanan_detail->jumlah_barang + $jumlah_barang);
                    $this->db->set('jumlah_harga', $pesanan_detail->jumlah_harga + $barang->harga_barang * $jumlah_barang);
                    $this->db->where('barang_id', $pesanan_detail->barang_id);
                    $this->db->update('pesanan_detail');
                }

                // jumlah
                $pesanan        = $this->db->get_where('pesanan', ['user_id' => $user->id_user, 'status' => 0])->row();
                if($pesanan->total_pesanan + $jumlah_barang >= 20) {
                    $total_all = $pesanan->total_pesanan + $jumlah_barang;
                    $this->db->set('total_harga', 18500 * $total_all);
                    $this->db->set('total_pesanan', $total_all);
                    $this->db->where('id_pesanan', $pesanan->id_pesanan);
                    $this->db->update('pesanan');
                } else {                    
                    $this->db->set('total_harga', $pesanan->total_harga + $barang->harga_barang * $jumlah_barang);
                    $this->db->set('total_pesanan', $pesanan->total_pesanan + $jumlah_barang);
                    $this->db->where('id_pesanan', $pesanan->id_pesanan);
                    $this->db->update('pesanan');
                }

            redirect('user/pesanan/keranjang');
        }
    }
}