<?php

class Blog extends CI_Controller
{
	public function index()
	{
		$this->load->database();

		$query = $this->db->query("SELECT * FROM blog");
		$data['blogs'] = $query->result();

		$this->load->view('blog', $data);
	}
}
