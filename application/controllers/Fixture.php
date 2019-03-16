<?php

class Fixture extends CI_Controller
{

	public function __construct()
	{
		$this->load->library('Newsfixture');
	}


	public function index()
	{

		echo $this->newsfixture->show_hello_world();
	}
}
