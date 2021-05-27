<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // jika user sudah login, tampilan halaman login tidak bisa di akses
        if ($this->session->userdata('email')) {
            redirect('welcome');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email'   => 'email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul']  = 'Halaman Login';
            $this->load->view('template/header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        } else {
            // validasi login berhasil
            $this->_login();
        }
    }

    public function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            // jika email benar, di cek passwordnya
            if (password_verify($password, $user['password'])) {
                // jika password benar siapkan data
                $data = [
                    'email'     => $user['email'],
                    'role'      => $user['role']
                ];
                // kemudian simpan data kedalam session
                $this->session->set_userdata($data);
                if ($user['role'] == 'admin') {
                    redirect('admin/dashboard');
                } else {
                    redirect('user/dashboard');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email tidak terdaftar, silahkan registrasi terlebih dahulu</div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('welcome');
        }
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique'     => 'email sudah digunakan',
            'valid_email'   => 'email tidak valid'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'min_length' => 'password terlalu lemah',
            'matches'    => 'password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul']  = 'Halaman Registrasi';
            $this->load->view('template/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama', TRUE)),
                'email'         => htmlspecialchars($this->input->post('email', TRUE)),
                'no_tlp'       => htmlspecialchars($this->input->post('no_tlp', TRUE)),
                'alamat'        => htmlspecialchars($this->input->post('alamat', TRUE)),
                'kecamatan'     => htmlspecialchars($this->input->post('kecamatan', TRUE)),
                'kode_pos'      => htmlspecialchars($this->input->post('kode_pos', TRUE)),
                'dropship'      => 0,
                'reseller'      => 0,
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role'          => 'user'
            ];

            $this->auth_model->registrasi($data);
            // pesan dengan flash_data
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Registrasi berhasil, silahkan login</div>');
            redirect('auth');
        }
    }

    public function blocked()
    {
        $data['judul']  = 'Akses dilarang';
        $this->load->view('template/header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil keluar</div>');
        redirect('auth');
    }
}
