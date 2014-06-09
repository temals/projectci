<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaction extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("default_model"));
	}
	 
	public function index($action="",$id="")
	{

		$post = $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));
		
		switch($action)
		{
			case "add":
				$view = "transaction/add";
				$getdata = (!empty($id) ? $this->default_model->getData("transaction",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata[0] : "");
				$structure = "";
			break;
			
			case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("transaction",array("id"=>$id));
					redirect(site_url("transaction/company"));
				}
			break;
			
			case "save":
				$this->default_model->store("transaction",$post);
				redirect(site_url("transaction/company"));
			break;
			
			default:
				$view = "transaction/default";
				$data = $this->default_model->getData("transaction");
				$structure = array("name"=>"Company","address"=>"Address","status"=>"Status");
			break;
		}
		
		$parse = array(
			"view" => $view,
			"data" => $data,
			"structure" => $structure,
			"page" => "transaction/index",
		);
		
		$this->load->view('template',$parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */