<?php 

class Dev extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $parse = array(
            "view"=>"dev/default"
        );
        
        $this->load->view("template",$parse);
    }
}

?>