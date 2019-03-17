<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-03-17
 * Time: 오전 10:39
 */

class NewsModelTest extends TestCase
{


	public function setup()
	{
		$this->resetInstance();
		$this->CI->load->model('News_model');
		$this->obj = $this->CI->News_model;

		$this->CI->load->library('Newsfixture');
	}

	/**
	 * @dataProvider provider
	 */
	public function testGetNews(int $count)
	{
		$this->CI->newsfixture->add_newsFixtureData($count);

		$actural = $this->obj->get_news();

		$this->assertInternalType('array', $actural);
		$this->assertCount($count, $actural);
	}


	/**
	 * @dataProvider provider
	 */
	public function testRecodeCount(int $count = 20)
	{
		$this->CI->newsfixture->add_newsFixtureData($count);

		$actural = $this->obj->recode_count();

		$this->assertEquals($count,$actural);
	}

	public function provider()
	{
		return array(
			array(10),
			array(20),
			array(30),
			array(40)
		);
	}

}
