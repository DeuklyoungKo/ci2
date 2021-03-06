<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-03-14
 * Time: 오후 10:37
 */

class News_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}


	public function get_news($slug = FALSE, int $limit = null, int $start = null)
	{

		if ($slug === FALSE) {

			if (!is_null($limit) && !is_null($start)){
				$this->db->limit($limit, $start);
			}

			$query = $this->db->get('news');

			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug' => $slug));
		return	$query->row_array();
	}


	public function set_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		);

		return $this->db->insert('news', $data);
	}


	public function recode_count():int
	{
		return $this->db->count_all('news');
	}


}
