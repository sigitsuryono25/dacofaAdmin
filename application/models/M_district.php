<?php

class M_district extends CI_Model
{
	public function getAllDistrict($field = "*")
	{
		$q = $this->db->select($field)
			->from('wilayah_kabupaten')
			->join('wilayah_provinsi', 'wilayah_kabupaten.provinsi_id=wilayah_provinsi.id')
			->join('tb_countries', 'wilayah_provinsi.country_code=tb_countries.alpha_2');
		return $q->get();
	}
	public function getDistrictWhere($field = "*", $wheres = null)
	{
		$q = $this->db->select($field)
			->from('wilayah_kabupaten')
			->join('wilayah_provinsi', 'wilayah_kabupaten.provinsi_id=wilayah_provinsi.id', 'left')
			->join('tb_countries', 'wilayah_provinsi.country_code=tb_countries.alpha_2', 'left');
		if (!empty($wheres)) {
			$q->where($wheres);
		}
		// return $q->get_compiled_select();
		return $q->get();
	}
}
