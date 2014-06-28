<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {
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
				$data = (!empty($getdata) ? $getdata : "");
			break;
			
			case "delete":
				if(!empty($id))
				{
					$this->default_model->delete("transaction",array("id"=>$id));
					redirect(site_url("transaction/index"));
				}
			break;
			
			case "save":
				if(count($post['master_price_id']) > 1)
			{
				$data['id']						    = $post['id'];
				$data['customer_id'] 		 		= $post['customer_id'];
				//$data['pick_address_id']  		 	= $post['pick_address_id'];
				//$data['ship_address_id']	 		= $post['ship_address_id'];
				$data['quantity']					= $post['quantity'];
				$data['gross_weight']     			= $post['gross_weight'];
				$data['volume']		 				= $post['volume'];
				$data['volume_weight']		 		= $post['volume_weight'];
				$data['drescription']			 	= $post['drescription'];
				$data['transport_type']				= $post['transport_type'];
				$data['special_instruction']		= $post['special_instruction'];
				$data['price']						= $post['price'];
				$data['picked_by']					= $post['picked_by'];
				$data['delivered_by']			 	= $post['delivered_by'];
				$data['handover_by']			 	= $post['handover_by'];
				$data['received_by']			 	= $post['received_by'];
				$datas['attachment_no']				= $post['attachment_no'];
				$datak['address']					= $post['address'];

				$this->default_model->store("attachment",$datas);
				$this->default_model->store("master_address",$datak);

				for($i=1; $i<count($post['master_price_id']); $i++)
				{
					$data1['master_price_id'] 	= $post['master_price_id'][$i];
					$this->default_model->store("transaction_detail_price",$data1);			
				}
				
			}

				$this->default_model->store("transaction",$data);
				redirect(site_url("transaction/index"));
			break;
			
			default:
				$view = "transaction/default";
				$data = $this->default_model->getData("transaction","","array");
			break;
		}
		
		$parse = array(
			"view" => $view,
			"data" => $data,
			"page" => "transaction/index",
		);
		
		$this->load->view('template',$parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */