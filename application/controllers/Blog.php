<?php

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// $this->load->database();
		// $this->load->helper('url');
		// $this->load->helper('form');
		$this->load->model('Blog_model');
	}
	public function index($offset = 0)
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('blog/index');
		$config['total_rows'] = $this->Blog_model->getTotalBlogs();
		$config['per_page'] = 3;
		$this->pagination->initialize($config);

		$query = $this->Blog_model->getBlogs($config['per_page'], $offset);
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
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
		$this->form_validation->set_rules('content', 'Konten', 'required');

		if ($this->form_validation->run()) {
			$data['title'] = $this->input->post('title');
			$data['url'] = $this->input->post('url');
			$data['content'] = $this->input->post('content');

			$config['upload_path']          = 'uploads';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('cover')) {
				echo $this->upload->display_errors();
			} else {
				$data['cover'] = $this->upload->data()['file_name'];
			}

			$id = $this->Blog_model->insertBlog($data);

			if ($id) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
				redirect('/');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal disimpan</div>');
				redirect('/');
			}
		}

		$this->load->view('form_add');
	}

	public function edit($id)
	{
		$query = $this->Blog_model->getSingleBlog('id', $id);
		$data['blog'] = $query->row();

		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
		$this->form_validation->set_rules('content', 'Konten', 'required');

		if ($this->form_validation->run() === TRUE) {
			$post['title'] = $this->input->post('title');
			$post['url'] = $this->input->post('url');
			$post['content'] = $this->input->post('content');

			$config['upload_path']          = 'uploads';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->do_upload('cover');

			if (!empty($this->upload->data()['file_name'])) {
				$post['cover'] = $this->upload->data()['file_name'];
			}

			$id = $this->Blog_model->updateBlog($id, $post);

			if ($id) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil di edit</div>');
				redirect('/');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal di edit</div>');
				redirect('/');
			}
		}

		$this->load->view('form_edit', $data);
	}

	public function delete($id)
	{
		$result = $this->Blog_model->deleteBlog($id);

		if ($result)
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus</div>');
		else
			$this->session->set_flashdata('message', '<div class="alert alert-warning">Data berhasil dihapus</div>');

		redirect('/');
	}

	public function login()
	{
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($username == 'admin' && $password == 'password') {
                $this->session->username = 'admin';
            
                redirect('/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">Username/Password tidak valid</div>');

                redirect('blog/login');
            }
        }

		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('/');
	}
}
