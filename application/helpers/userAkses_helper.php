<?php

function belum_login()
{
    // buat instansiasi, karena kita tidak bisa membuat this begitu saja
    $ci = get_instance();
    // jika user belum login maka arahkan ke halaman login
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // jika sudah login di cek dulu, user tersebut dari role apa ? dengan cara mengambil data dari session role
        $role       = $ci->session->userdata('role');

        $menu       = $ci->uri->segment(1);

        $queryAksesMenu    = $ci->db->get_where('user_akses_menu', [
            'role'         => $role,
            'role_akses'   => $menu
        ]);

        // lalu di cek kembali, jika user akses ada datanya maka jalankan
        // jika tidak ada atau < 1, maka arahkann ke halaman blocked
        if ($queryAksesMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
