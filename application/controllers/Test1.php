<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-03-15
 * Time: 오후 3:14
 */

class Test1 extends CI_Controller
{

	public function index(){
		$this->load->library('Test');
		echo $this->test->show_hello_world();
	}

}
