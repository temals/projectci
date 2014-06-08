<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("default_model"));
	}
	 
	public function index()
	{
		$this->load->view('template');
	}
	
	public function login()
	{
		$post = $this->input->post();
		$login = $this->processLogin($post);
		$this->load->view("include/login",$login);
	}
	
	public function processLogin($post="")
	{
		if(!empty($post['username']) || (!empty($post['password'])))
		{
			if(valid_mail($post['username']))
			{
				$msg = "Email";
			}
			else
			{
				$msg = "Username";
			}
		}
		else
		{
			$msg = "Masukkan Username Dan Password";
			$style = "warning";
		}
		
		return array("msg"=>$msg,"style"=>$style);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */