<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		echo $this->uri->segment(1);
	}

	public function index(){
		
	}

	public function create(){
		if($this->input->post()){
			$this->fval->set_rules('formEmail','E-Mail','required|valid_email|trim');
			$this->fval->set_rules('formPassword','Password','required|trim');
			$this->fval->set_rules('formPasswordRepeat','Repeated Password','required|matches[formPassword]|trim');

			if ($this->fval->run()) {
				echo "lele";
			}

		}

 		$this->load->view('admin_user_create');
	}
}

