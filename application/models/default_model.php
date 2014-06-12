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
	
    /*  getData
        $table = string | array("table1"=>"field","table2"=>"field2","table3"=>"field3","table4","field4") //allowing to join table
        //untuk aliasing gunakan table1;a query akan menjadi table1 as a
        $params = array("field"=>"value","field"=>"value"),
        $dataType ="array" | "" //allowing you to callback array or single array with empty $dataType
        $select = string //selected data
    */
    
	function getData($table="",$params="",$dataType="",$select="")
	{
		if(!empty($params))
		{
			$this->db->where($params);
		}
		
        if(is_array($table))
        {
            if(!empty($select))
            {
                $this->db->select($select);
            }
		
            //left join table
            $i = 0;
            $rtable = array();
            $count = (count($table)) - 1;
            $first = array();
            foreach($table as $tbl=>$field)
            {
                if(is_numeric(strpos($tbl,";")))
                {
                    $exTable = explode(";",$tbl);
                    $alias = $exTable[1];
                    $tbl = $exTable[0];
                }
                
                if($i % 2 == 0)
                {
                   $rTable = array($tbl,$field,(!empty($alias) ? $alias : "")); 
                   if($i == 0)
                   {
                       $getTable = (!empty($alias) ? $tbl." as ".$alias : $tbl);
                       $first = array($tbl,$field,$alias);
                   }
                    
                    if($count == $i)
                    {
                        $this->db->join((!empty($alias) ? $tbl." as ".$alias : $tbl), (!empty($alias) ? $alias : $tbl).".".$field." = ".(!empty($alias) ? $first[2] : $first[0]).".".$first[1], 'left');  
                    }
                }
                else
                {
                   $this->db->join((!empty($alias) ? $tbl." as ".$alias : $tbl), (!empty($alias) ? $alias : $tbl).".".$field." = ".(!empty($alias) ? $rTable[2] : $rTable[0]).".".$rTable[1], 'left');   
                }
                $i++;
            }
            
            $table = $getTable;
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