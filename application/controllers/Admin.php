<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->uri->segment(2) == 'login') {
			if (!$this->loader->user) {
				redirect('admin/login');
			}
		} else {
			if ($this->loader->user) {
				redirect('admin');
			}
		}
	}

	public function index()
	{
		
	}

	public function create()
	{
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

	public function login()
	{
		
	}

	// Guide categories
	public function guide_category_create()
	{
		if ($this->input->post('create')) {
			$this->fval->set_rules('title', 'Title', 'required');

			if ($this->fval->run()) {
				$formdata = array(
					'gc_name' => $this->input->post('title'),
					'gc_desc' => $this->input->post('content')
				);

				$this->db->insert('guides_category', $formdata);
			}
		}
		$this->loader->view('admin/guide_category_create');
	}

	public function guide_category_delete()
	{
		if ($this->input->post('delete')) {
			foreach ($this->input->post('categories') as $value) {
				$this->db->where('gc_id', $value)
					->delete('guides_category');

				$this->db->where('g_category', $value)
					->delete('guides');
			}
		}
		$data['categories'] = $this->db->get('guides_category')->result_array();

		$this->loader->view('admin/guide_category_delete', $data);
	}

	public function guide_category_update($id = null)
	{
		if (!$id) {
			echo "giv id plz";
			
		}

		if ($this->input->post('update')) {
			$formdata = array(
				'gc_name' => $this->input->post('title'),
				'gc_desc' => $this->input->post('content')
			);

			$this->db->where('gc_id', $id)
				->update('guides_category', $formdata);
		}

		$data['category'] =
			$this->db->where('gc_id', $id)
				->get('guides_category')
					->result_array();

		$this->loader->view('admin/guide_category_update', $data);
	}

	// Guides
	public function guide_create()
	{
		if ($this->input->post('create')) {
			$this->fval->set_rules('title', 'Titel', 'required');
			$this->fval->set_rules('content', 'Indhold', 'required');

			if ($this->fval->run()) {
				$formdata = array(
					'g_name' => $this->input->post('title'),
					'g_content' => $this->input->post('content'),
					'g_category' => $this->input->post('category')
				);

				$this->db->insert('guides', $formdata);
			}
		}

		$data['categories'] = $this->db->get('guides_category')->result_array();

		$this->loader->view('admin/guide_create', $data);
	}

	public function guide_delete()
	{
		if ($this->input->post('delete')) {
			foreach ($this->input->post('guides') as $key => $value) {
				$this->db->where('g_id', $value)->delete('guides');
			}
		}

		$data['categories'] = $this->db->get('guides_category')->result_array();

		foreach ($data['categories'] as $key => $value) {
			$data['categories'][$key]['guides'] = $this->db->where('g_category', $value['gc_id'])->get('guides')->result_array();
		}

		$this->loader->view('admin/guide_delete', $data);
	}

	public function guide_update($guide = null)
	{
		if ($this->input->post('update')) {
			$this->fval->set_rules('title', 'Titel', 'required');
			$this->fval->set_rules('content', 'Indhold', 'required');

			if ($this->fval->run()) {
				$this->db->where('g_id',
					($guide && is_numeric($guide))?
						$guide
					: $this->db->get('guides')
						->first_row()->g_id
				)->update('guides', array(
					'g_name' => $this->input->post('title'),
					'g_content' => $this->input->post('content')
				));
			}
		}

		$data['guide'] = ($guide && is_numeric($guide))?
			$this->db->where('g_id', $guide)
				->get('guides')
					->result_array()
			: $this->db->limit(1)
				->get('guides')
					->result_array();

		$this->loader->view('admin/guide_update', $data);
	}
}
