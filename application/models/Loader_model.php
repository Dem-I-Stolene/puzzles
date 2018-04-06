<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loader_model extends CI_Model {

	var $user;

	public function __construct()
	{
		parent::__construct();

		if ($this->sess->u_email) {
			$this->user =
				$this->db->where('u_email',
					$this->sess->u_email)
						->get('users')
							->row_array();
		}
	}

	public function view($content = 'page_not_found', $data = array())
	{
		if (!$content) {
			$content = 'page_not_found';
		}
		
		$this->load->view($content, $data);
	}
}
