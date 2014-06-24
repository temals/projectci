<?php

class Jurnal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('default_model'));
	}

	public function index($action="",$id="")
	{
		$post 	= $this->input->post();
		$action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));

		switch ($action)
		{
			case 'add':
					$view    = 'jurnal/add';
					$getdata = (!empty($id) ? $this->default_model->getdata("jurnal",array("id"=>$id)) : "");
					$data 	 = (!empty($getdata) ? $getdata : "");	
			break;

			case 'delete':
					if(!empty($id))
					{
						$this->default_model->delete("jurnal",array("id"=>$id));
						redirect(site_url('jurnal/index'));
					}
			break;

			case 'save' :
					if(count($post['coa_id']) > 1)
				   {
						$data['no_jurnal'] = $post['no_jurnal'];
						for($i=1; $i<count($post['coa_id']); $i++)
						{
							$data['coa_id'] = $post['coa_id'][$i];
							$data['debit']  = $post['debit'][$i];
							$data['credit'] = $post['credit'][$i];
							$data['date']	= $post['date'][$i];
							$data['id'];
							
							$this->default_model->store("jurnal",$data);
						}
				   }
               			redirect(site_url('jurnal/index'));
			break;
			
			default:
				$data = $this->default_model->getData(
					array(
					array("jurnal as a","master_coa as b"),
					array("a.coa_id"=>"b.id")
					),

					"",
					"array",
					"a.*,b.name as coa_id"
				);
				$view = 'jurnal/default';
			break;
		}
			$parse = array(
            "view" => $view,
            "data" => $data,
            "page" => "jurnal/index"
        );
        
        echo $this->load->view("template",$parse);
	}
}
