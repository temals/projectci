<?php

class Invoice extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('default_model'));
	}

	function Index($action="", $id="")
	{
		$post   = $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

		switch($action)
		{
			case 'add':
			$view 	 = "invoice/add";
			$getdata = (!empty($id) ? $this->default_model->getdata("invoice",array("id"=>$id)) :"");
			$data	 = (!empty($getdata) ? $getdata : "");
			break;

			case 'delete':
			if(!empty($id))
			{
				$this->default_model->delete("invoice",array("id"=>$id));
				redirect(site_url('invoice/index'));
			}
			break;

			case 'save':
			if(count($post['transaksi_id']) > 1)
			{
				$data['id']					 = $post['id'];
				$data['customer_id'] 		 = $post['customer_id'];
				$data['no_invoice']  		 = $post['no_invoice'];
				$data['faktur_pajak_id']	 = $post['faktur_pajak_id'];
				$data['due_date']			 = $post['due_date'];
				$data['payment_date']        = $post['payment_date'];
				$data['down_payment']		 = $post['down_payment'];
				$data['description']		 = $post['description'];
				$data['user_id']			 = $post['user_id'];
				$data['date']				 = $post['date'];
				$data['status']				 = $post['status'];

				$this->default_model->store("master_faktur_pajak",array("id"=>$data['faktur_pajak_id'],"status"=>"Unavailable"));

				for($i=1; $i<count($post['transaksi_id']); $i++)
				{

					$data1['transaksi_id']	 = $post['transaksi_id'][$i];
					$this->default_model->store("invoice_detail",$data1);

				}
				
				$data['id'];
				$this->default_model->store("invoice",$data);

			}

			redirect(site_url('invoice/index'));
			break;

			default :
			$data = $this->default_model->getData(array(
				array("invoice as a","master_company as b","master_faktur_pajak as c","user as d"),
				array("a.customer_id"=>"b.id", "a.faktur_pajak_id"=>"c.id", "a.user_id"=>"d.id")),
			"",
			"array",
			"a.*,b.name as customer_id, c.no_faktur as faktur_pajak_id, d.username as user_id"
			);
			$view = "invoice/default";
			break;
		}
		$parse = array(
			"view" => $view,
			"data" => $data,
			"page" => "invoice/index"
			);
		$this->load->view('template',$parse);
	}
}
