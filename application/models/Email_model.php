<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		// The mail sending protocol.
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		// SMTP Port - the port that you is requiredgo
		$config['smtp_port'] = 465;
		// SMTP Username like. (abc@gmail.com)
		$config['smtp_user'] = "demistolene@gmail.com";
		// SMTP Password like (abc***##)
		$config['smtp_pass'] = "wheelchair";
		$config['mailtype'] = 'html';

		$this->email->initialize($config);
	}

	public function send_mail($send_to, $subject = null, $message)
	{
		$this->email->from('demistolene@gmail.com', 'Puzzle');
		$this->email->to($send_to);

		$this->email->subject(($subject)? $subject : 'Svar');
		$this->email->message($message);

		if ($this->email->send()) {
			echo "ja";
		} else {
			echo $this->email->print_debugger();
		}
	}
}
