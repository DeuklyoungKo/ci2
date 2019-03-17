<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-03-14
 * Time: 오후 10:47
 */

class News extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}


	public function index($listStartNum = 0)
	{

		$total_count = $this->News_model->recode_count();

		$limitListCount = 5;

		$this->output->enable_profiler(TRUE);

		$this->load->library('pagination');

		$config['base_url'] = '/news/index/';
		$config['total_rows'] = $total_count;
		$config['per_page'] = $limitListCount;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);

		$data['news'] = $this->News_model->get_news(FALSE,$limitListCount,$listStartNum);
		$data['title'] = 'News';
		$data['pagination'] = $this->pagination->create_links();


		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}


	public function view($slug = NULL)
	{

		$data['news_item'] = $this->News_model->get_news($slug);

		if (empty($data['news_item'])) {
			show_404();
		}

		$data['title'] = "News view : ".$data['news_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}


	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Greate a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		$this->output->enable_profiler(TRUE);

		if ($this->form_validation->run() === FALSE) {


			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->News_model->set_news();
			$this->load->view('news/success');
		}
	}


}
