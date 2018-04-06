<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$data['categories'] = $this->db->get('guides_category')->result_array();
		$data['guides'] = 

		echo "<pre>";
			print_r($data['categories']);
		echo "</pre>";

		$this->loader->view('forside');
	}
}
