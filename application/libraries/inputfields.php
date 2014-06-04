<?php

class inputfields
{
	function statuslist($name="",$value="",$parameters="",$label="")
	{
		$options = array(""=>"Select Status","Active"=>"Active","Inactive"=>"Inactive","Trashed"=>"Trashed");
		return $this->setlist($name,$options,$value,$parameters);
	}
	
	function text($name="",$value="",$parameters="",$label="")
	{
		return form_input($name,$value,$parameters);
	}
	
	function textarea($name="",$value="",$parameters="",$label="")
	{
		return form_textarea($name,$value,$parameters);
	}
	
	function setlist($name="",$options="",$value="",$parameters="")
	{
		return form_dropdown((!empty($name) ? $name : ""), $options, (!empty($value) ? $value : ""), (!empty($parameters) ? $parameters : ""));
	}
}