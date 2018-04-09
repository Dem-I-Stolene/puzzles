<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login(){
		if($this->input->post()){
			$this->fval->set_rules('formEmail','E-Mail','required|valid_email');
			$this->fval->set_rules('formPassword','Password','required');

			if($this->fval->run()){
				$formEmail 		= $this->input->post('formEmail');
				$formPassword 	= $this->input->post('formPassword');

				$this->db->where('u_email', $formEmail);
				$sqlQuery = $this->db->get('users');

				if($sqlQuery->num_rows()){
					$dbFetch = $sqlQuery->row();
					if(password_verify($formPassword,$dbFetch->u_password)){
						echo "password correct!";
					}else{
						echo "fail!";
					}
				}
			}
		}
		$this->loader->view('login');
	}
}
	