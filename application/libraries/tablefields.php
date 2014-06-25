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
					//"type",
					//"jenis",
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
					"driver_id",
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

	function master_charter_price($post="")
	{
		$fields['fields'] = array("id","vehicle_type_id","price","location_id","dest_location_id","delivery_time","return_doc_time","status");
		$fields['primary'] ="id";
		return $this->returnFields($fields,$post);
	}
	
	function privilege($post="")
	{
		$fields['fields'] = array("id","user_type_id","user_id","menu","action","last_modified");
		$fields['primary'] ="id";
		return $this->returnFields($fields,$post);
	}

	function jurnal($post="")
	{	$fields['fields']  = array("id","no_jurnal","coa_id","debit","credit","date","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function invoice($post="")
	{
		$fields['fields'] = array("id","customer_id","no_invoice","faktur_pajak_id","due_date","payment_date","down_payment","description","user_id","date","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function invoice_detail($post="")
	{
		$fields['fields']	= array("id","transaksi_id","charge","vat","packing","other","down_payment","amount","status");
		$fields['primary']	= "id";
		return $this->returnFields($fields,$post);
	}

	function shipment($post="")
	{
		$fields['fields'] = array("id","sppb","vehicle_id","driver_id","second_driver_id","active_location_id","description","date","penyerah","penerima","shipping_date","arrived_date","complete_date","status");
		$fields['primary'] = "id";
		return $this->returnFields($fields,$post);
	}

	function shipment_detail($post="")
	{
		$fields['fields'] = array("id","transaction_id","penyerah","penerima","date","shipping_date","arrived_date","complete_date","remark","status");
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
