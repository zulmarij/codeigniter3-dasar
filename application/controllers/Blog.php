<?php

class Blog extends CI_Controller
{
	public function index()
	{
		$data['blogs'] = [
			[
				'title' => 'Artikel Pertama',
				'content' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae commodi iure quas voluptates unde natus repellendus ipsa vel, enim expedita earum odit asperiores incidunt tempore voluptatibus hic accusamus perferendis dolor.</p>'
			],
			[
				'title' => 'Artikel Kedua',
				'content' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae commodi iure quas voluptates unde natus repellendus ipsa vel, enim expedita earum odit asperiores incidunt tempore voluptatibus hic accusamus perferendis dolor.</p>'
			],
			[
				'title' => 'Artikel Ketiga',
				'content' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae commodi iure quas voluptates unde natus repellendus ipsa vel, enim expedita earum odit asperiores incidunt tempore voluptatibus hic accusamus perferendis dolor.</p>'
			],
		];
		$this->load->view('blog', $data);
	}
}
