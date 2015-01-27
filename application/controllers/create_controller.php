<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller Create Controller
 *
 * Controller for create a new controller Grocery CRUD
 *
 * Copyright (C) 2015 Gaëtan Cottrez.
 *
 *
 * @package    	Generate Controller GC
 * @copyright  	Copyright (c) 2015, Gaëtan Cottrez
 * @license 	GNU GENERAL PUBLIC LICENSE
 * @license 	http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE
 * @version    	1.0.0
 * @author 		Gaëtan Cottrez <gaetan.cottrez@laviedunwebdeveloper.com>
 */

class Create_controller extends CI_Controller {

	public function __construct()
	{
		//	Obligatoire
		parent::__construct();

		//load library
		$this->load->library('generate_controller_gc');
		

	}

	public function index()
	{
		$this->create_controller();
	}
	
	public function set_line_field_form(){
		echo $this->generate_controller_gc->set_line_field_form($this->input->post('index'));
	}
	
	public function get_option_field_on_table(){
		echo $this->generate_controller_gc->get_option_field_on_table($this->input->post('val'));
	}
	
	public function treatment()
	{
		$this->generate_controller_gc->set_success_url('create_controller');
		$this->generate_controller_gc->treatment();
	}
	
	public function check_table_exist($table){
		$this->load->model('generate_controller_gc_model');
		$query = $this->generate_controller_gc_model->check_table_exist($table);
		$this->lang->load('generate_controller_gc');
		if ($query->num_rows() > 0)
		{
			$this->form_validation->set_message('check_table_exist', $this->lang->line('generate_controller_gc_name_table_error'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function validation()
	{
		$this->generate_controller_gc->validation();
	}

	public function create_controller()
	{
		$this->generate_controller_gc->set_success_url('create_controller');
		$this->generate_controller_gc->set_validation_url('create_controller/validation');
		$this->generate_controller_gc->set_treatment_form_url('create_controller/treatment');
		$this->generate_controller_gc->set_add_line_url('create_controller/set_line_field_form');
		$this->generate_controller_gc->set_option_field_on_table('create_controller/get_option_field_on_table');
		$this->generate_controller_gc->set_form();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/create_controller.php */