<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		
		parent::__construct();
		$this->load->model(array("default_model"));
	}
	 
	public function index()
	{
		$this->load->view('template');
	}
	
	public function company($action="")
	{
		
		$company = $this->default_model->getData("master_company");
		
		switch($action)
		{
			case "add":
				$view = "master/add";
				$table = array("company"=>"text","address"=>"textarea");
			break;
			
			default:
				$view = "master/default";
				$table = array("company"=>"Company");
			break;
		}
		
		$parse = array(
			"view" => $view,
			"viewdata" => $company,
			"table" => $table
		);
		
		$this->load->view('template',$parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */