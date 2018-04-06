<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		echo $this->uri->segment(1);
	}

	public function guides($guide = null)
	{
		$this->loader->view('guides');
	}
}
