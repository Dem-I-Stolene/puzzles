<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->uri->segment(2) !== 'login') {
			if (!$this->loader->user) {
				redirect('admin/login');
			}
		} else {
			if ($this->loader->user) {
				redirect('admin');
			}
		}

		echo $this->uri->segment(2);
	}

	public function index()
	{
		
	}

	public function login()
	{
		
	}
}
