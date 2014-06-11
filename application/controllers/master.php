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
				$structure = array("name"=>"text","address"=>"textarea","status"=>"status_lists");
			break;
			
			case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("master_company",array("id"=>$id));
					redirect(site_url("master/company"));
				}
			break;
			
			case "save":
				//check if data exists
                $isExist = $this->default_model->existsData("master_company",$post,array("name","type"));
                if(!empty($isExist))
                {
                    $view = "master/add";
				    $data = $post;
                    $structure = array(
                        "type"=>"company_type_lists",                        
                        "name"=>"text",
                        "address"=>"textarea",
                        "location_id"=>"location_lists",
                        "npwp"=>"text",
                        "phone"=>"text",
                        "mobile"=>"text",
                        "fax"=>"text",
                        "email"=>"text",
                        "contact_name"=>"text",
                        "contact_phone"=>"text",
                        "tax"=>"text",
                        "discount"=>"text",
                        "term_payment"=>"text",
                        "status"=>"status_lists"
                        );
                    $notif = array("msg"=>"Data Tersebut Telah ada, Masukkan Data Lainnya","type"=>"danger");
                }
                else
                {
                    $this->default_model->store("master_company",$post);
                    redirect(site_url("master/company"));
                }
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
            "notif" => (!empty($notif) ? $notif : ""),
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


	public function coa($action="",$id="")
	{
			$post 	= $this->input->post();
			$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

			switch ($action)
		{
			case 'add':
						$view 	   = "master/add";
						$getdata   = (!empty($id) ? $this->default_model->getData("master_coa",array("id" => $id)): "");
						$data 	   = (!empty($getdata) ? $getdata : "");
						$structure = array(
							"kode"        => "text",
							"name" 		  => "text",
							"description" => "textarea"
						);
			break;

			case 'delete' :
						if(!empty($id))
						{
							$this->default_model->delete("master_coa",array("id" => $id));
							redirect(site_url('master/coa'));
						}
			break;

			case 'save' :
						$this->default_model->store("master_coa",$post);
						redirect(site_url('master/coa'));
			break;
			
			default:
						$view      = 'master/default';
						$data 	   = $this->default_model->getData("master_coa","","array");
						$structure = array(
						"kode"	   		=> "Kode",
						"name"	   		=> "Name",
						"description"	=> "Description"
							);
			break;
		}
						$parse = array(
						"view" 		=> $view,
						"data" 		=> $data,
						"structure" => $structure,
						"page"		=> "master/coa"
						);
						$this->load->view('template',$parse);
	}

	public function location($action="",$id="")
	{
			$post 		= $this->input->post();
			$action 	= (!empty($action) ? $action :(!empty($post['action']) ? $post['action'] : ""));

			switch ($action) 
		{
			case 'add':
						$view 		= "master/add";
						$getdata 	= (!empty($id) ? $this->default_model->getData("master_location",array("id" => $id)): "");
						$data		= (!empty($getdata) ? $getdata : "");
						$structure	= array(
						"location"	=> "text",
						"type"		=> "text",
						"parent_id"	=> "text",
						"status"	=> "status_lists"
							);
			break;

			case 'save' :
						$this->default_model->store("master_location",$post);
						redirect(site_url('master/location'));
			break;

			case 'delete':
						if(!empty($id))
						{
							$this->default_model->delete("master_location",array("id"=>$id));
							redirect(site_url('master/location'));
						}
			break;
			
			default:
				$view	= 'master/default';
				$data 	= $this->default_model->getdata("master_location","","array");
				$structure	=array(
				"location"	=> "Location",
				"type"		=> "Type",
				"parent_id"	=> "Parent ID",
				"status"	=> "Status"
				);
			break;
		}

				$parse=array(
				"view"		=> $view,
				"data"		=> $data,
				"structure"	=> $structure,
				"page"		=> 'master/location'
				);
				$this->load->view('template',$parse);
	}

	public function vehicle($action="",$id="")
	{
		$post	= $this->input->post();
		$action = (!empty($action) ? $action :(!empty($post['action']) ? $post['action'] : ""));

			switch ($action)
			{
			case 'add':
					$view 	   = "master/add";
					$getdata   = (!empty($id) ? $this->default_model->getData("master_vehicle",array("id"=>$id)):"");
					$data 	   = (!empty($getdata) ? $getdata : "");
					$structure =array(
					"merk"				=> "text",
					"type"				=> "text",
					"model"				=> "text",
					"no_polisi"			=> "text",
					"status"			=> "status_lists"
					);
			break;
			
			case 'delete':
					if(!empty($id))
					{
						$this->default_model->delete("master_vehicle",array("id"=>$id));
						redirect(site_url('master/vehicle'));
					}
			break;
			
			case 'save':
					$this->default_model->store("master_vehicle",$post);
					redirect(site_url('master/vehicle'));
			break;
			
			default:
					$view 		= 'master/default';
					$data 		= $this->default_model->getData("master_vehicle","","array");
					$structure	= array(
					"merk"				=> "Merk",
					"type"				=> "Type",
					"model"				=> "Model",
					"no_polisi"			=> "No Polisi",
					"status"			=> "Status"
					);
			break;
			}
				$parse=array(
				"view"		=> $view,
				"data"		=> $data,
				"structure"	=> $structure,
				"page"		=> 'master/vehicle'
				);
				$this->load->view('template',$parse);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */