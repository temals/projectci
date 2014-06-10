<?php

class inputfields
{
	protected $ci;
	protected $user;
	function __construct()
	{	
		$this->ci = get_instance();
		$this->ci->load->model(array("default_model"));
		$this->user = $this->ci->session->userdata("user");
	}
	
	public function isHidden($parameters="")
	{
		return $this->defineInput($name="",$value="",$parameters,$label="","isHidden");
	}
	
	public function defineInput($name="",$value="",$parameters="",$label="",$callback="")
	{
		$getType = (!empty($parameters['type']) ? $parameters['type'] : "text");
		
		if(is_array($getType))
		{
			$parameters['type'] = (!empty($parameters['type']['type']) ? $parameters['type']['type'] : (is_string($parameters) ? $parameters : "text"));
			$parameters = array_merge($parameters,$getType);
		}
		
		$parameter = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		
		if(isset($parameters['privilege']))
		{
			$privilege = explode(",",$parameters['privilege']);
			foreach($privilege as $prev)
			{
				if($prev == $this->user['user_type_id'])
				{
					$hidden = 0;
					break;
				}
				
				$hidden = 1;
			}
			
			$parameters['type'] = (!empty($hidden) ? "hidden" : $parameters['type']);
		}
		
		$type = (!empty($parameters['type']) ? $parameters['type'] : "text");
		
		
		if(!method_exists("inputfields",$type))
		{
			$type = "text";
		}
		
		if($callback == "isHidden")
		{
			return (!empty($parameters['type']) ? ($parameters['type'] == "hidden" ? 1 : "") : "");
		}
		else
		{
			return $this->$type($name,(isset($parameters['value']) ? $parameters['value'] : $value),$parameter,$label);
		}
		
		
	}

	function status_lists($name="",$value="",$parameters="",$label="")
	{
		$options = array(""=>"Select Status","Active"=>"Active","Inactive"=>"Inactive","Trashed"=>"Trashed");
		return $this->setlist($name,$options,$value,$parameters);
	}

	function faktur_status_lists($name="",$value="",$parameters="",$label="")
	{
		$options = array(""=>"Select Status","Available"=>"Available","Unavailable"=>"Unavailable");
		return $this->setlist($name,$options,$value,$parameters);
	}

	function unit_lists($name="",$value="",$parameters="",$label="")
	{
		$options = array(""=>"Select Type","jarak"=>"Jarak","berat"=>"Berat","waktu"=>"Waktu");
		return $this->setlist($name,$options,$value,$parameters);
	}
	
	function customer_lists($name="",$value="",$parameters="",$label="")
	{
		$select = array("id","name");
		$options = $this->ci->default_model->getdata("master_company",array("type"=>"Customer"),"array");
		return $this->setlist($name,$options,$value,$parameters,$select);
	}
	
	function user_type_lists($name="",$value="",$parameters="",$label="")
	{
		$select = array("id","user_type");
		$options = $this->ci->default_model->getdata("user_type","","array");
		return $this->setlist($name,$options,(!empty($value) ? $value : "3"),$parameters,$select);
	}
	
	function text($name="",$value="",$parameters="",$label="")
	{
		return form_input($name,$value,$parameters);
	}
	
	function hidden($name="",$value="",$parameters="",$label="")
	{
		return form_hidden($name,$value,$parameters);
	}
	
	function password($name="",$value="",$parameters="",$label="")
	{
		return form_password($name,$value,$parameters);
	}
	
	function textarea($name="",$value="",$parameters="",$label="")
	{
		return form_textarea($name,$value,$parameters);
	}

	/* 	Setlist
		$name = string, : 
		$options = array(),
		$value = string,
		$parameters = string,
		$select array($key,$val)
	*/
	function setlist($name="",$options="",$value="",$parameters="",$select="")
	{
		if(!empty($select))
		{
			$getOptions = array();
			
			$getOptions[] = "Select ".ucfirst(substr($name,0,strpos($name,"_")));
			foreach($options as $option)
			{
				if(is_array($option))
				{
					$getOptions[$option[$select[0]]] = $option[$select[1]];
				}
				else
				{
					$getOptions[$option->$select[0]] = $option->$select[1];
				}
			}
			
			$options = $getOptions;
		}
		return form_dropdown((!empty($name) ? $name : ""), $options, (!empty($value) ? $value : ""), (!empty($parameters) ? $parameters : ""));
	}
	
	function setStringParameter($parameters)
	{
		$string = "";
		foreach($parameters as $key=>$val)
		{
			$string .= $key."='".$val."' ";
		}
		return $string;
	}
}