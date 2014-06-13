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
				$structure = array(
					"type"			=>"company_type_lists",                        
					"name"			=>"text",
					"address"		=>"textarea",
					"location_id"	=>"location_lists",
					"npwp"			=>"text",
					"phone"			=>"text",
					"mobile"		=>"text",
					"fax"			=>"text",
					"email"			=>"text",
					"contact_name"	=>"text",
					"contact_phone"	=>"text",
					"tax"			=>"text",
					"discount"		=>"text",
					"term_payment"	=>"text",
					"status"		=>"status_lists"
					);
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
						"type"			=>"company_type_lists",                        
						"name"			=>"text",
						"address"		=>"textarea",
						"location_id"	=>"location_lists",
						"npwp"			=>"text",
						"phone"			=>"text",
						"mobile"		=>"text",
						"fax"			=>"text",
						"email"			=>"text",
						"contact_name"	=>"text",
						"contact_phone"	=>"text",
						"tax"			=>"text",
						"discount"		=>"text",
						"term_payment"	=>"text",
						"status"		=>"status_lists"
						);
					$alert = array("msg"=>"Data Tersebut Telah ada, Masukkan Data Lainnya","type"=>"danger");
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
				"view" 		=> $view,
				"data" 		=> $data,
				"alert" 	=> (!empty($alert) ? $alert : ""),
				"notif" 	=> (!empty($notif) ? $notif : ""),
				"structure" => $structure,
				"page" 		=> "master/company",
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
					"parent_id"	=> "location_lists",
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

            //join table
				default:
				$view	= 'master/default';
                //menggunakan join pada query dengan mengganti table menjadi array, lihat model untuk penggunaan
				$data 	= $this->default_model->getdata(
					array("master_location;a"=>"parent_id","master_location;b"=>"id"),
					"",
					"array",
					"a.*,b.location as parent_id"
					);
				$structure	=array(
					"location"	=> "Location",
					"type"		=> "Type",
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
					"jenis"				=> "text",
					"model"				=> "text",
					"no_polisi"			=> "text",
					"pemilik"			=> "text",
					"tahun_pembuatan"	=> "text",
					"no_rangka"			=> "text",
					"no_mesin"			=> "text",
					"bahan_bakar"		=> "text",
					"no_kir"			=> "text",
					"nomer_bbpkb"		=> "text",
					"capacity_weight"	=> "text",
					"expired_stnk"		=> array("id"=>"date_expired_stnk"),
					"expired_ibm"		=> array("id"=>"date_expired_ibm"),
					"expired_sipa"		=> array("id"=>"date_expired_sipa"),
					"driver_id"			=> "text",
					"company_id"		=> array("type"=>"company_type_lists"),
					"date"				=> array("id"=>"date"),
					"last_modified"		=> array("id"=>"date_last_modified"),
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
					"no_polisi"			=> "No Polisi",
					"bahan_bakar"		=> "Bahan Bakar",
					"capacity_weight"	=> "Capacity Weight",
					"expired_stnk"		=> "Exp STNK",
					"expired_ibm"		=> "Exp IBM",
					"expired_sipa"		=> "Exp SIPA",
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

		public function unit($action="",$id="")
		{

			$post = $this->input->post();
			$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

			switch($action)
			{
				case "add":
				$view = "master/add";
				$getdata = (!empty($id) ? $this->default_model->getData("master_unit",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata : "");
				$structure = array("unit"=>"text","type"=>"type_unit_lists","status"=>"status_lists","description"=>"textarea");
				break;

				case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("master_unit",array("id"=>$id));
					redirect(site_url("master/unit"));
				}
				break;

				case "save":
				$this->default_model->store("master_unit",$post);
				redirect(site_url("master/unit"));
				break;

				default:
				$view = "master/default";
				$data = $this->default_model->getData("master_unit","","array");
				$structure = array("unit"=>"Unit","type"=>"Type","status"=>"Status");
				break;

			}

			$parse = array(
				"view" => $view,
				"data" => $data,
				"structure" => $structure,
				"page" => "master/unit",
				);

			$this->load->view('template',$parse);
		}


		public function price($action="",$id="")
		{

			$post = $this->input->post();
			$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

			switch($action)
			{
				case "add":
				$view = "master/add";
				$getdata = (!empty($id) ? $this->default_model->getData("master_price",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata : "");
				$structure = array(
					"name"				=>"text",
					"location_id"		=>"location_lists",
					"dest_location_id"	=>"location_lists",
					"min_weight"		=>"text",
					"land_price"		=>"text",
					"air_price"			=>"text",
					"water_price"		=>"text",
					"over_tonage_price"	=>"text",
					"description"		=>"textarea",
					"expired"			=> array("id"=>"date_expired"),
					"status"			=>"status_lists"
					);
				break;

				case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("master_price",array("id"=>$id));
					redirect(site_url("master/price"));
				}
				break;

				case "save":
				$this->default_model->store("master_price",$post);
				redirect(site_url("master/price"));
				break;

				default:
				$view = "master/default";
				$data = $this->default_model->getData("master_price","","array");
				$structure = array("name"=>"Name","min_weight"=>"Min Weight","land_price"=>"Land Price","air_price"=>"Air Price","water_price"=>"Water Price","over_tonage_price"=>"Over Tonage Price","status"=>"Status");
				break;

			}

			$parse = array(
				"view" 			=> $view,
				"data" 			=> $data,
				"structure" 	=> $structure,
				"page" 			=> "master/price"
				);

			$this->load->view('template',$parse);
		}

		public function faktur_pajak($action="",$id="")
		{

			$post = $this->input->post();
			$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

			switch($action)
			{
				case "add":
				$view = "master/add";
				$getdata = (!empty($id) ? $this->default_model->getData("master_faktur_pajak",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata : "");
				$structure = array("no_faktur"=>"text","status"=>"status_available_lists");
				break;

				case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("master_faktur_pajak",array("id"=>$id));
					redirect(site_url("master/faktur_pajak"));
				}
				break;

				case "save":
				$this->default_model->store("master_faktur_pajak",$post);
				redirect(site_url("master/faktur_pajak"));
				break;

				default:
				$view = "master/default";
				$data = $this->default_model->getData("master_faktur_pajak","","array");
				$structure = array("no_faktur"=>"No Faktur","status"=>"Status");
				break;

			}

			$parse = array(
				"view" 			=> $view,
				"data" 			=> $data,
				"structure" 	=> $structure,
				"page" 			=> "master/faktur_pajak"
				);

			$this->load->view('template',$parse);
		}

		public function staff($action="",$id="")
		{

			$post = $this->input->post();
			$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

			switch($action)
			{
				case "add":
				$view = "master/add";
				$getdata = (!empty($id) ? $this->default_model->getData("master_staff",array("id"=>$id)) : "");
				$data = (!empty($getdata) ? $getdata : "");
				$structure = array("company_id"=>"company_lists","user_id"=>"user_lists","identity"=>"text","name"=>"text","departemen"=>"text","jabatan"=>"text","gender"=>"gender_lists","agama"=>"text","address"=>"textarea","phone"=>"text","mobile"=>"text","email"=>"email","status"=>"status_lists");
				break;

				case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("master_staff",array("id"=>$id));
					redirect(site_url("master/staff"));
				}
				break;

				case "save":
				$this->default_model->store("master_staff",$post);
				redirect(site_url("master/staff"));
				break;

				default:
				$view = "master/default";
				$data 	= $this->default_model->getdata(
					array("master_staff;a"=>"company_id","master_company;b"=>"id"),
					"",
					"array",
					"a.*,b.name as company_id"
					);				
				$structure = array("company_id"=>"Company","name"=>"Name","jabatan"=>"Jabatan","mobile"=>"Mobile","status"=>"status");
				break;

			}

			$parse = array(
				"view" => $view,
				"data" => $data,
				"structure" => $structure,
				"page" => "master/staff",
				);

			$this->load->view('template',$parse);
		}

		public function charter_price($action="",$id="")
	{
		$post 	= $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

			switch ($action)
		{
			case 'add':
					  $view 	= "master/add";
					  $getdata  = (!empty($id) ? $this->default_model->getData("master_charter_price",array("id"=>$id)) : "");
					  $data 	= (!empty($getdata) ? $getdata : "");
					  $structure=array(
					  	"vehicle_type_id"  => "vehicle_type_lists",
					  	"price"			   => "text",
					  	"location_id"	   => "location_lists",
					  	"dest_location_id" => "location_lists",
					  	"delivery_time"	   => array("id"=>"date_delivery_time"),
					  	"return_doc_time"  => array("id"=>"date_return_doc_time"),
					  	"status"		   => "status_lists"
					  	);
				break;

				case 'delete' :
							if(!empty($id))
							{
								$this->default_model->delete("master_charter_price",array("id"=>$id));
								redirect(site_url('master/charter_price'));
							}
				break;

				case 'save' :
							$this->default_model->store("master_charter_price",$post);
							redirect(site_url('master/charter_price'));
				break;
			
				default:
					$view	= 'master/default';
					$data 	= $this->default_model->getdata(
									array("master_charter_price;a"=>"location_id","master_location;b"=>"id"),
                      				"",
                      				"array",
                      				"a.*,b.location as location_id"
                      				);

					$structure =array(
						"vehicle_type_id"	=> "Type",
						"price"				=> "Price",
						"location_id"		=> "Location ID",
						"dest_location_id" 	=> "Location Dest",
						"status"			=> "Status"

						);
				break;
		}
				$parse=array(
				"view"		=> $view,
				"data"		=> $data,
				"structure"	=> $structure,
				"page"		=> 'master/charter_price'
				);
				$this->load->view('template',$parse);
	}

}

	/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
