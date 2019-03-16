<?php

class Form extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->load->library('calendar');


		$this->form_validation->set_rules(
			'username', 'Username',
			'callback_username_check',
			array(
				'required'      => 'You have not provided %s.',
				'is_unique'     => 'This %s already exists.'
			)
		);
		$this->form_validation->set_rules('password', 'Password', 'required',
										  array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');


		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('form/myform');
		}
		else
		{
			$this->load->view('form/formsuccess');
		}

	}

	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
