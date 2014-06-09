<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct()
	{
		
		parent::__construct();
		$this->load->model(array("default_model"));
	}
	 
	public function index()
	{
		$this->load->view('template');
	}
	
	/* Ada beberapa nilai yang saya parsing ke dalam view
		- view : adalah file yang akan di load kedalam div content
		- data : adalah data yang akan saya parsing sesuai controllernya, jika di master company berarti saya melempar data company dari database
		- structure : adalah susunan data yang saya tampilkan pada default / pada add , dengan otomatis yang tampil sesuai dengan structur yang saya parsing, ada 2 structure yang berbeda antara menampilkan dan mengedit data
				> structure pada bagian add, merupakan array, keynya berupa name dan valuenya berupa tipe inputnya contoh namenya company, dan type inputnya adalah text;
				> structure pada bagian default (menampilkan data) keynya berupa name dan valuenya berupa label atau text yang ditampilkan sebagai header data
		- page : merupakan penentu action pada form ataupun sebagai title pada halaman,
		
		Note : file utama adalah template.php, dari sini data dilemparkan kembali kepada view yang menjadi tujuannya ditandai dengan parse['view'] diatas.
	*/
	public function company($action="",$id="")
	{

		$post = $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));
		
		switch($action)
		{
			case "add":
				$view = "master/add";
				$getdata = (!empty($id) ? $this->default_model->getData("master_company",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata : "");
				$structure = array("name"=>"text","address"=>"textarea","status"=>"statuslist");
			break;
			
			case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("master_company",array("id"=>$id));
					redirect(site_url("master/company"));
				}
			break;
			
			case "save":
				$this->default_model->store("master_company",$post);
				redirect(site_url("master/company"));
			break;
			
			default:
				$view = "master/default";
				$data = $this->default_model->getData("master_company","","array");
				$structure = array("name"=>"Company","address"=>"Address","status"=>"Status");
			break;
		}
		
		$parse = array(
			"view" => $view,
			"data" => $data,
			"structure" => $structure,
			"page" => "master/company",
		);
		
		$this->load->view('template',$parse);
	}
	
	public function users($action="",$id="")
	{

		$post = $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));
		
		switch($action)
		{
			case "add":
				$view = "master/add";
				$getdata = (!empty($id) ? $this->default_model->getData("user",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata : "");
				$structure = array(
						"username"=>"text",
						"password"=>
							array("type"=>"password","value"=>"","placeHolder"=>"Masukkan Password untuk mengganti password lama"),
						"name"=>"text",
						"email"=>"text",
						"user_type_id"=>array("type"=>"user_type_lists","privilege"=>"1"), //artinya hanya super users yang dapat mengedit jenis user atau jenis member
						"status"=>array("type"=>"status_lists","privilege"=>"1,2") //hanya super users dan admin yang hanya bisa mengedit status
					);
			break;
			
			case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("user",array("id"=>$id));
					redirect(site_url("master/users"));
				}
			break;
			
			case "save":
				$post['password'] = md5($post['password']);
				$this->default_model->store("user",$post);
				redirect(site_url("master/users"));
			break;
			
			default:
				$view = "master/default";
				$data = $this->default_model->getData("user","","array");
				$structure = array("username"=>"Username","name"=>"Name","email"=>"Email","status"=>"Status");
			break;
		}
		
		$parse = array(
			"view" => $view,
			"data" => $data,
			"structure" => $structure,
			"page" => "master/users",
		);
		
		$this->load->view('template',$parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */