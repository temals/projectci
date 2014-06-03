<?php

class Default_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function getData($table="")
	{
		$query = $this->db->get($table);
		return $query->result_array();
	}

}