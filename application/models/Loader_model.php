<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loader_model extends CI_Model {

	public function view($content = 'page_not_found', $data = array())
	{
		if (!$content) {
			$content = 'page_not_found';
		}
		
		$this->load->view($content, $data);
	}
}
