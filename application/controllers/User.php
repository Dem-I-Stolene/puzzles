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
					echo password_hash('smoelf97', PASSWORD_DEFAULT);
					echo '<br>';
					echo $dbFetch->u_password;


					if(password_verify($formPassword, password_hash('smoelf97', PASSWORD_DEFAULT))){
						echo "success";
					}
				}
			}
		}
		$this->loader->view('login');
	}
}
	