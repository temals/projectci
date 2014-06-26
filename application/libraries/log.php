<?php

/* Untuk menambahkan library log, tambahkan table log terlebih dahulu pada database
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
*/

class log
{
	private $ci;
	private $user;
	
	function __construct()
	{
		$this->ci = get_instance();
		$this->ci->load->model("default_model");
		$this->user = $this->ci->session->userdata("user");
	}
	
	function set($menu="",$action="",$description="")
	{
		if(empty($description))
		{
			$description = $this->getDescription($menu,$action);
		}
	
		$query = "INSERT INTO log VALUES ('','".$this->user['id']."','".$menu."','".$action."','".$description."','".date("Y-m-d H:i:s")."')";
		$this->ci->default_model->getQuery($query);
	}
	
	function get($limit="")
	{
		$query = "SELECT log.*,user.name as user_id FROM log LEFT JOIN user ON user.id=log.user_id ORDER BY id DESC ".(!empty($limit) ? "limit 0,".$limit : "");
		return $this->ci->default_model->getQuery($query,true);
	}
	
	private function getDescription($menu="",$action="")
	{
		switch($action)
		{
			case "delete":
				return "Menghapus data pada ".$menu;
			break;
			
			default:
				return "Menambahkan data baru pada ".$menu;
			break;
		}
	}
}

?>