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
            (!empty($select) ? $this->db->select($select) : "");
            $this->setJoin($table);
            $query = $this->db->get();
        }
        else
        {
            $query = $this->db->get($table);
        }
		
        
        
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
    
	/* 	getQuery adalah method yang parameternya adalah query ke database sebagai alternatif jika tidak ada method
		yang sesuai dengan query anda
		
		Argument
		$query = string, contoh "SELECT DISTINCT field1 FROM TABLE1 WHERE field2='kondisi1'"
		$callback = Boolean(true / false) default false, jika query bertipe retrieve data yang anda panggil
					kembali datanya masukkan true
	*/
    function getQuery($query="",$callback=false)
	{
		$getQuery = $this->db->query($query);
		if($callback == true)
		{
			return $getQuery->result_array();
		}
	}
    
    private function setJoin($table="")
    {		
		$listsTable = (!empty($table[0]) ? $table[0] : "");
		$listsJoin = (!empty($table[1]) ? $table[1] : "");;
		
		if(is_array($listsJoin))
		{
			for($i=0;$i<count($listsTable);$i++)
			{
				if($i == 0)
				{
					$this->db->from($listsTable[$i]);
				}
				else
				{
					$j = 1;
					foreach($listsJoin as $key=>$val)
					{
						if($j == $i)
						{
							$this->db->join($listsTable[$i],$key."=".$val,"left");
						}
						$j++;
					}
				}
			}
		}
		else
		{
			 $i =1;
			foreach($table as $key=>$val)
			{
				if($i == 1)
				{
						$table = $key;
						$field = $val;
						$join = $table;
				}
				else
				{
						$this->db->join($key,$key.".".$val."=".$table.".".$field,"left");
				}
				
				$i++;
			}
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
				
				//mengembalikan id dari data yang diupdate
				return $data[$data['primary']];
			}
			else
			{
				$this->db->set($data['data']);
				$this->db->insert($table);
				
				//mengembalikan id data yang terakhir disimpan
				return $this->db->insert_id();
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