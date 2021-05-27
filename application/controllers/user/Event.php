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
			'judul'		=> 'Event Boxer3D',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'event'		=> $this->db->query("SELECT * FROM event ORDER BY id_event DESC")->result()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/event');
		$this->load->view('template/user_footer');
	}

	public function detail($id_event)
	{
		$data = [
			'judul'		=> 'Detail event',
			'user'      => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'event'	=> $this->db->query("SELECT * FROM event WHERE id_event = $id_event")->row()
		];
		$this->load->view('template/user_header', $data);
		$this->load->view('user/detail_event');
		$this->load->view('template/user_footer');
	}
}