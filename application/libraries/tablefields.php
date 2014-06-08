<?php

/*Library table fields merupakan library yang memudahkan kita menyusun setiap parsing data, 
kedalam setiap fields sesuai tablenya.
*/

class tablefields
{
	//master company
	//mempunyai fields id, type, dll
	//dengan ini master company hanya mengembalikan data sesuai fieldnya, jadi jika diparsing $post['section'] atau apapun yang tidak sesuai dengan fieldnya, datanya tidak akan dikembalikan oleh master company.
	function master_company($post="")
	{
		$fields['fields'] = array("id","type","name","address","npwp","phone","mobile","fax","email","bank","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}
	
	//menambahkan method baru
	function master_lainnya($post="")
	{
		//tentukan fieldsnya dimasukkan kedalam array
		$fields['fields'] = array("field1","field2","field3","fieldN");
		//menentukan primarynya
		$fields['primary'] = "primaryfield";
		
		//method terakhir wajib ada, karena method inilah yang menyusun setiap nilai kedalam fieldsnya
		return $this->returnFields($fields,$post);
	}
	
	function returnFields($fields="",$post="")
	{
		$data = array();
		foreach($post as $key=>$val)
		{
			foreach($fields['fields'] as $field)
			{
				if(strtolower($key) == strtolower($field))
				{
					$data['data'][$key] = $val;
				}
			}
		}
		
		if(!empty($post[$fields['primary']]))
		{
			$data[$fields['primary']] = $post[$fields['primary']];
			$data['primary'] = $fields['primary'];
			unset($data['data'][$fields['primary']]);
		}
		
		return $data;
	}
}