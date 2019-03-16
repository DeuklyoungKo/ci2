<?php

class Fixture extends CI_Controller
{

	public function __construct()
	{

	}


	public function index()
	{
		$this->load->library('Newsfixture');
		echo $this->newsfixture->show_hello_world();
	}
}
