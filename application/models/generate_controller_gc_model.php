<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Models Generate Controller GC
 *
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

class generate_controller_gc_model extends CI_Model
{
	public function __construct() {
        parent::__construct();
    }

    /**
	 *	show tables in database
	 *
	 *	@return object		result of request
	 */
	public function show_tables()
	{
		return $this->db->query('SHOW TABLES FROM '.$this->db->database);
	}
	
	 /**
	 *	check table exist
	 *
	 *	@return object		result of request
	 */
	public function check_table_exist($table='')
	{
		if($table != "") return $this->db->query('SHOW TABLES FROM '.$this->db->database.' LIKE "'.$table.'"');
	}
	
	/**
	 *	create table in database
	 *
	 *	@return object		result of request
	 */
	public function create_table($query)
	{
		return $this->db->query($query);
	}
	
	/**
	 *	get field on table
	 *
	 *	@return object		result of request
	 */
	public function get_field_on_table($table)
	{
		if($table != '') return $this->db->query("DESCRIBE ".$table);
	}
	
}

/* End of file generate_controller_gc_model.php */
/* Location: ./application/models/generate_controller_gc_model.php */