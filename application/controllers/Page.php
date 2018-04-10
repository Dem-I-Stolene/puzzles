<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function guides($guide = null)
	{
		if (!$guide) {
			$data['categories'] = $this->db->get('guides_category')->result_array();

			foreach ($data['categories'] as $key => $cat) {
				$data['categories'][$key]['guides'] =
					$this->db->where('g_category', $cat['gc_id'])
						->get('guides')
							->result_array();
			}
		} else {
			$data['guides'] =
				$this->db->where('g_category', $guide)
					->get('guides')->result_array();
		}
		echo "<pre>";
			print_r($data);
		echo "</pre>";
	}
}
