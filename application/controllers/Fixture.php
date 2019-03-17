<?php

class Fixture extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

/*
		if(! is_cli() ) {
			show_404();
			exit;
		}
		*/
		$this->load->library('Newsfixture');
	}



	public function index(int $count = 40)
	{
//		$this->output->enable_profiler(TRUE);

		echo $this->newsfixture->add_newsFixtureData($count);

		$this->load->view('test/fixtureIndex');
	}
}
