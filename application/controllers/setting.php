<?php

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        echo "Settings";
    }
    
    function privilege($action="",$id="")
    {
        $post = $this->input->post();
        $action = (!empty($action) ? $action : (!empty($post['action']) ? $post['action'] : ""));
        
        switch($action)
        {
            case "add":
                $data = (!empty($id) ? $this->default_model->getdata("privilege",array("id"=>$id)) : "");
                $view = "setting/privilege/add";
            break;
            
            case "delete":
                (!empty($id) ? $this->default_model->delete("privilege",array("id",$id)) : "");
                redirect(site_url("setting/privilege"));
            break;
            
            case "save":
               if(count($post['menu']) > 1)
               {
                    $data['user_type_id'] = $post['user_type_id'];
                    $data['user_id'] = $post['user_id'];
                    for($i=1;$i<count($post['menu']);$i++)
                    {
                        $data['menu'] = $post['menu'][$i];
                        $data['action'] = $post['action'][$i];
                        
                        $getPrivilege = $this->default_model->getData("privilege",array("user_type_id"=>$data['user_type_id'],"user_id"=>$post['user_id'],"menu"=>$data['menu']));
                        
                        $data['id'] = $getPrivilege['id'];
                        
                        $this->default_model->store("privilege",$data);
                    }
               }
            
                redirect(site_url("setting/privilege"));
            break;
            
            default : 
                $data = $this->default_model->getData(
                        array(
                                array("privilege as a","user_type as b","user as c"),
                                array("a.user_type_id"=>"b.id","a.user_id"=>"c.id")
                        ),"","array","a.*,b.user_type as user_type_id,c.username as user_id");
                $view = "setting/privilege/default";
            break;
        }
        
        $parse = array(
            "view" => $view,
            "data" => $data,
            "page" => "setting/privilege"
        );
        
        echo $this->load->view("template",$parse);
    }
    
}