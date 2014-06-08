<?php

/* Default model
	default model di buat segeneral mungkin, jadi tidak perlu membuat model baru jika tidak menggunakan parameter khusus
*/

class Default_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function getData($table="",$params="")
	{
		if(!empty($params))
		{
			$this->db->where($params);
		}
		$query = $this->db->get($table);
		return $query->result_array();
	}
	
	/* Khusus untuk save, tambahkan method baru pada library tablefield sesuai nama table, 
	untuk memudahkan anda dalam menyimpan data, 
	ini telah dibuat agar anda seminimalisir menuliskan kode saat menyimpan atau mengupdate data */
	
	function store($table,$post="")
	{
		//mengecek apakah ada method pada library tablefield sesuai nama table yang di parsing
		//contoh master_company (Lihat library/tablefields)
		$getTable = method_exists("tablefields",$table);
		if(!empty($getTable))
		{
			//jika nilai di $post ke method tersebut, hal ini meminimalisir kita untuk menulis setiap field yang akan kita simpan ke database, 
			//sejauh ini secara otomatis akan di set setiap nilai yang sesuai dengan field databasenya
			$data = $this->tablefields->$table($post);
			
			//jika terdapat nilai dari primary artinya dia melakukan update
			if(!empty($data['primary']))
			{
				//memasukkan setiap $post sesuai pada field databasenya
				$this->db->set($data['data']);
				//memasukkan primary keynya sebagai where atau parameter untuk mengupdate data
				$this->db->where($data['primary'],$data[$data['primary']]);
				
				$this->db->update($table);
			}
			//jika nilai primary kosong, maka tambahkan data baru
			else
			{
				//masukkan atau set setiap nilai dari pos kedalam masing masing fields, fields disini telah kita susun sesuai database pada library tablefields
				$this->db->set($data['data']);
				//simpan data
				$this->db->insert($table);
			}
		}
		//$this->db->insert($table,$post);
	}
	
	function delete($table="",$params="")
	{
		if(!empty($params))
		{
			$this->db->delete($table,$params);
		}
	}

}