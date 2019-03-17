<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class newsfixture {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->database();
		$this->CI->load->library('session');
	}

	public function add_newsFixtureData(Int $count = 20)
	{

		$this->CI->db->truncate('news');
		//add flash data
		$this->CI->session->set_flashdata('addnews',"truncated news table");

		$this->CI->session->set_flashdata('addnews',"start add into news");
		for ($i = 1; $i <= $count; $i++) {
			$this->addnewsData();
		}

//		echo "Fixture completed".PHP_EOL;
		$this->CI->session->set_flashdata('addnews',"Fixture completed");

	}

	public function addnewsData()
	{

		$object = array(
			'title' => 'test1',
			'slug' => 'test1_1123_123123',
			'text' => 'hohohohoho'
		);

		$this->CI->db->insert('news', $object);

	}

}
