<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Blog_model');
	}
	public function index()
	{
		$query = $this->Blog_model->getBlogs();
		$data['blogs'] = $query->result();

		$this->load->view('blog', $data);
	}

	public function detail($url)
	{
		$query = $this->Blog_model->getSingleBlog('url', $url);
		$data['blog'] = $query->row();

		$this->load->view('detail', $data);
	}

	public function add()
	{
		if ($this->input->post()) {
			$data['title'] = $this->input->post('title');
			$data['url'] = $this->input->post('url');
			$data['content'] = $this->input->post('content');

			$id = $this->Blog_model->insertBlog($data);

			if ($id) {
				echo "Data berhasil disimpan";
				redirect('/');
			} else {
				echo "Data gagal disimpan";
			}
		}

		$this->load->view('form_add');
	}

	public function edit($id)
	{
		$query = $this->Blog_model->getSingleBlog('id', $id);
		$data['blog'] = $query->row();

		if ($this->input->post()) {
			$post['title'] = $this->input->post('title');
			$post['url'] = $this->input->post('url');
			$post['content'] = $this->input->post('content');

			$id = $this->Blog_model->updateBlog($id, $post);

			if ($id) {
				echo "Data berhasil diedit";
			} else {
				echo "Data gagal diedit";
			}
		}

		$this->load->view('form_edit', $data);
	}

	public function delete($id)
	{
		$this->Blog_model->deleteBlog($id);

		redirect('/');
	}
}
