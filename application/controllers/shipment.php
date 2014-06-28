<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipment extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("default_model"));
	}

	function index($action="",$id="")
	{

		$post = $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));
		
		switch($action)
		{
			case "add":
			$view = "shipment/add";
			$getdata = (!empty($id) ? $this->default_model->getData("shipment",array("id"=>$id)) : "");
			$data = (!empty($getdata) ? $getdata : "");
			break;
			
			case "delete":
			if(!empty($id))
			{
				$this->default_model->delete("shipment",array("id"=>$id));
				redirect(site_url("shipment"));
			}
			break;
			
			case "save":
			if(count($post['transaction_id']) > 1)
			{
				$data['id']						= $post['id'];
				$data['sppb'] 		 			= $post['sppb'];
				$data['vehicle_id']  		 	= $post['vehicle_id'];
				$data['driver_id']	 			= $post['driver_id'];
				$data['second_driver_id']		= $post['second_driver_id'];
				$data['active_location_id']     = $post['active_location_id'];
				$data['description']		 	= $post['description'];
				$data['date']		 			= $post['date'];
				$data['penyerah']			 	= $post['penyerah'];
				$data['penerima']				= $post['penerima'];
				$data['shipping_date']			= $post['shipping_date'];
				$data['arrived_date']			= $post['arrived_date'];
				$data['complete_date']			= $post['complete_date'];
				$data['status']				 	= $post['status'];

				for($i=1; $i<count($post['transaction_id']); $i++)
				{
					$data1['transaction_id'] 	= $post['transaction_id'][$i];
					$data1['penyerah']			= $post['detail_penyerah'][$i];
					$data1['penerima']			= $post['detail_penerima'][$i];
					$data1['date']				= $post['detail_date'][$i];
					$data1['shipping_date']		= $post['detail_shipping_date'][$i];
					$data1['arrived_date']		= $post['detail_arrived_date'][$i];
					$data1['complete_date']		= $post['detail_complete_date'][$i];
					$data1['remark']			= $post['detail_remark'][$i];
					$data1['status']			= $post['detail_status'][$i];
					$this->default_model->store("shipment_detail",$data1);			
				}
				
			}

			$this->default_model->store("shipment",$data);

			redirect(site_url("shipment"));
			break;

			default:
			$view = "shipment/default";
			$data = $this->default_model->getData("shipment","","array");
			break;
		}

		$parse = array(
			"view" => $view,
			"data" => $data,
			"page" => "shipment/index",
			);

		$this->load->view('template',$parse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */