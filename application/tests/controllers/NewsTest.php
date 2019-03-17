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


	public function gittest1()
	{
		echo 'test1';
	}


	public function gittest2()
	{
		echo 'test2';
	}

	public function gittest3()
	{
		echo 'test3';
	}

	public function gittest4()
	{
		echo 'test4';
	}

	public function gittest5()
	{
		echo 'test5';
	}

	public function gittest6P()
	{
		echo 'test6';
	}

}
