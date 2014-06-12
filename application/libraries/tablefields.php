<?php

class tablefields
{
	function master_company($post="")
	{
		$fields['fields'] = array("id","type","name","address","npwp","phone","mobile","fax","email","bank","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}
	
	function user($post="")
	{
		$fields['fields'] = array("id","username","password","name","email","user_type_id","date","last_modified","last_activity","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function master_coa($post="")
	{
		$fields['fields'] = array("id","kode","name","description");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function master_location($post="")
	{
		$fields['fields']=array("id","location","type","parent_id","status");
		$fields['primary']="id";
		return $this->returnFields($fields,$post);
	}

	function master_vehicle($post="")
	{
		$fields['fields']=array(
					"id",
					"merk",
					"type",
					"jenis",
					"model",
					"no_polisi",
					"pemilik",
					"tahun_pembuatan",
					"no_rangka",
					"no_mesin",
					"bahan_bakar",
					"no_kir",
					"nomer_bbpkb",
					"capacity_weight",
					"expired_stnk",
					"expired_ibm",
					"expired_sipa",
					"driver",
					"company_id",
					"date",
					"last_modified",
					"status"
		);
		$fields['primary']="id";
		return $this->returnFields($fields,$post);
	}

	function master_unit($post="")
	{
		$fields['fields'] = array("id","unit","type","status","description");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function master_price($post="")
	{
		$fields['fields'] = array("id","name","location_id","dest_location_id","min_weight","land_price","air_price","water_price","over_tonage_price","description","expired","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function master_faktur_pajak($post="")
	{
		$fields['fields'] = array("id","no_faktur","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function master_staff($post="")
	{
		$fields['fields'] = array("id","company_id","user_id","identity","name","departemen","jabatan","gender","agama","address","phone","mobile","email","status");
		$fields['primary'] = "id";
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