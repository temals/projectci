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
	
	function getData($table="",$params="",$dataType="")
	{
		if(!empty($params))
		{
			$this->db->where($params);
		}
		$query = $this->db->get($table);
		
		if($dataType == "array")
		{
			return $query->result_array();
		}
		else
		{
			$data = $query->result_array();
			return (!empty($data) ? $data[0] : "");
		}
		
		
	}
	
	/* Khusus untuk save, tambahkan method baru pada library tablefield sesuai nama table, untuk memudahkan anda dalam menyimpan data, ini telah dibuat agar anda seminimalisir menuliskan kode saat menyimpan atau mengupdate data */
	
	function store($table,$post="")
	{
		$getTable = method_exists("tablefields",$table);
		if(!empty($getTable))
		{
			$data = $this->tablefields->$table($post);
			if(!empty($data['primary']))
			{
				$this->db->set($data['data']);
				$this->db->where($data['primary'],$data[$data['primary']]);
				$this->db->update($table);
			}
			else
			{
				$this->db->set($data['data']);
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
    
     //melakukan pengecekan jika terdapat data yang sama pada table
    function existsData($table="",$post="",$unique_fields="")
    {
        $getTable = method_exists("tablefields",$table);
		if(!empty($getTable))
		{
			$data = $this->tablefields->$table($post);
            $uniques = array();
            foreach($data['data'] as $key=>$val)
            {
                foreach($unique_fields as $unique)
                {
                    if(strtolower($key) == strtolower($unique))
                    {
                        if(!empty($data['primary']))
                        {
                            $uniques[$key." !="] = $val;
                        }
                        else
                        {
                            $uniques[$key] = $val;
                        }
                    }
                }
            }
            
            if(!empty($uniques))
            {
                $is_unique = $this->getData($table,$uniques,"array");
                return (!empty($is_unique) ? 1 : "");
            }
        }
    }

}