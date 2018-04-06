<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		# lelel dette er ændringen
		echo $this->uri->segment(1);
	}

	public function index()
	{
		
	}
}
