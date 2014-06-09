<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("default_model"));
		$this->load->library(array("form_validation"));
		$this->load->helper(array("email"));
	}
	 
	public function index()
	{
		$this->load->view('template');
	}
	
	public function login()
	{
		$post = $this->input->post();
		$login = $this->processLogin($post);
		
		if(!empty($login['error']))
		{
			$this->load->view("include/login",$login);
		}
		else
		{
			redirect(site_url("dashboard"));
		}
	}
	
	public function processLogin($post="")
	{
		$this->form_validation->set_rules('username',"Username","required");
		$this->form_validation->set_rules('password',"Password","required");
		
		if($this->form_validation->run() == FALSE)
		{
			return array("error"=>1,"msg"=>"Username atau Password Harus Terisi","style"=>"alert alert-warning");
		}
		else
		{
			if(valid_email($post['username']))
			{
				$parameters = array("email"=>$post['username']);
			}
			else
			{
				$parameters = array("username"=>$post['username']);
			}
			
			$getUsers = $this->default_model->getdata("user",$parameters);
			if(empty($getUsers['id']))
			{
				return array("error"=>1,"msg"=>"Username Tidak Terdaftar","style"=>"alert alert-danger");
			}
			else
			{
				if(md5($post['password']) == $getUsers['password'])
				{
					$this->session->set_userdata('user', array("id"=>$getUsers['id'],"username"=>$getUsers['username'],"email"=>$getUsers['email'],"user_type_id"=>$getUsers['user_type_id']));
					return array("success"=>1,"msg"=>"Berhasil Login","style"=>"alert alert-success");
				}
				else
				{
					return array("error"=>1,"msg"=>"Password yang anda masukkan salah","style"=>"alert alert-danger");
				}
			}
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('users/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */