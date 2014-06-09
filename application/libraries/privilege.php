<?php

/* Hak akses users */

class privilege
{
	function is_allow($menu,$action)
	{
		$ci =& get_instance();
		$getUsers = $ci->session->userdata("user");

		//aksees tak terbatas untuk super users
		if($getUsers['user_type_id'] == "1")
		{
			return "allow";
		}
		else
		{
			$getPrivilege = $ci->default_model->getdata("privilege",array("user_type_id"=>$getUsers['user_type_id'],"menu"=>$menu));
			if(!empty($getPrivilege))
			{
				if(!empty($getPrivilege['user_id']))
				{
					if($getPrivilege['user_id'] != $getUsers['user_id'])
					{
						return "";
					}
				}
				
				$getAction = explode(";",$getPrivilege['action']);
				foreach($getAction as $cekAction)
				{
					if($cekAction == $action)
					{
						return "allow";
					}
				}
			}
		}
	}
}