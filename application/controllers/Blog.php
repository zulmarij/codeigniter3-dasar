<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		
		$this->load->helper('url');
	}
	public function index()
	{
		$query = $this->db->get('blog');
		$data['blogs'] = $query->result();
		
		$this->load->view('blog', $data);
	}
	
	public function detail($url)
	{
		$this->db->where('url', $url);
		$query = $this->db->get('blog');
		$data['blog'] = $query->row();
		
		$this->load->view('detail', $data);
	}
}
