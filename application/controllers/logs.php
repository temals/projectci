<?php

class Logs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('default_model'));
	}

	public function Index()
	{
		$view  = 'report/log/default';
		$data  = $this->log->get(10);
		$structure = array("user_id"=>"User", "action"=>"Action", "description"=>"Desksripsi", "datetime"=>"Date Time");
		$parse = array(
			"view" => $view,
			"data" => $data,
			"structure" => $structure
			);
		$this->load->view('template',$parse);
	}

}
