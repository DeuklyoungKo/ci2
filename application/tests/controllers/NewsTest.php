<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-03-17
 * Time: 오전 8:39
 */

class NewsTest extends TestCase
{
	public function test_NewsList()
	{
		$output = $this->request('GET', 'news');
		$this->assertContains('<title>news</title>', $output);
	}
}
