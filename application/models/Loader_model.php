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

		// General variables
		$data['title'] = (isset($data['title']))? $data['title'] : 'Puzzle';
		$data['logo'] = base_url('assets/images/logo.png');
		$data['css'][]['style'] = 'var';
		$data['css'][]['style'] = 'main';

		// Fix css names
		foreach ($data['css'] as $key => $value) {
			$data['css'][$key]['style'] = base_url('assets/css/').$value['style'].'.css?v='.rand(1, 100);
		}

		// Load page
		$this->parser->parse('template/head', $data);
		$this->parser->parse('template/nav', $data);
		$this->parser->parse($content, $data);
		$this->parser->parse('template/footer', $data);
		$this->parser->parse('template/end', $data);
	}
}
