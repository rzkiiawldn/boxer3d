<?php

class Auth_model extends CI_Model
{
    public function registrasi($data)
    {
        $this->db->insert("user", $data);
    }
}
