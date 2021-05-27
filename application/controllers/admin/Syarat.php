<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Syarat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belum_login();
	}

	public function syarat_reseller()
	{
		$data = [
			'judul'		=> 'Syarat Reseller',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'syarat'	=> $this->db->get_where('syarat',['role_id' => 2])->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/syarat/syarat_reseller');
		$this->load->view('template/admin_footer');
	}

	public function tambah_syarat_reseller()
	{
        $data = [
            'role_id'      => 2,
            'syarat'       => $this->input->post('syarat')
        ];
        $this->db->insert('syarat', $data);
        redirect('admin/syarat/syarat_reseller');
	}

	public function edit_syarat_reseller($id_syarat)
    {
        $this->db->set('syarat', $this->input->post('syarat'));
        $this->db->where('id_syarat', $id_syarat);
        $this->db->update('syarat');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data syarat berhasil</div>');
        redirect('admin/syarat/syarat_reseller');
    }

     public function hapus_syarat_reseller($id_syarat)
    {
        $this->db->where('id_syarat', $id_syarat);
        $this->db->delete('syarat');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data syarat</div>');
        redirect('admin/syarat/syarat_reseller');
    }

	public function tambah_syarat_dropshipper()
	{
        $data = [
            'role_id'      => 1,
            'syarat'       => $this->input->post('syarat')
        ];
        $this->db->insert('syarat', $data);
        redirect('admin/syarat/syarat_dropshipper');
	}

	public function edit_syarat_dropshipper($id_syarat)
    {
        $this->db->set('syarat', $this->input->post('syarat'));
        $this->db->where('id_syarat', $id_syarat);
        $this->db->update('syarat');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data syarat berhasil</div>');
        redirect('admin/syarat/syarat_dropshipper');
    }

     public function hapus_syarat_dropshipper($id_syarat)
    {
        $this->db->where('id_syarat', $id_syarat);
        $this->db->delete('syarat');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data syarat</div>');
        redirect('admin/syarat/syarat_dropshipper');
    }

	public function tambah_syarat_return()
	{
        $data = [
            'role_id'      => 3,
            'syarat'       => $this->input->post('syarat')
        ];
        $this->db->insert('syarat', $data);
        redirect('admin/syarat/syarat_return');
	}

	public function edit_syarat_return($id_syarat)
    {
        $this->db->set('syarat', $this->input->post('syarat'));
        $this->db->where('id_syarat', $id_syarat);
        $this->db->update('syarat');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Edit data syarat berhasil</div>');
        redirect('admin/syarat/syarat_return');
    }

     public function hapus_syarat_return($id_syarat)
    {
        $this->db->where('id_syarat', $id_syarat);
        $this->db->delete('syarat');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data syarat</div>');
        redirect('admin/syarat/syarat_return');
    }

	public function syarat_dropshipper()
	{
		$data = [
			'judul'		=> 'Syarat Dropshipper',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'syarat'	=> $this->db->get_where('syarat',['role_id' => 1])->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/syarat/syarat_dropshipper');
		$this->load->view('template/admin_footer');
	}
	public function syarat_return()
	{
		$data = [
			'judul'		=> 'Syarat Return',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'syarat'	=> $this->db->get_where('syarat',['role_id' => 3])->result()
		];
		$this->load->view('template/admin_header', $data);
		$this->load->view('admin/syarat/syarat_return');
		$this->load->view('template/admin_footer');
	}
}