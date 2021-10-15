<?php

class M_province extends CI_Model
{
	public function getAllProvince($field = "*")
	{
		$q = $this->db->select($field)
			->from('wilayah_provinsi')
			->join('tb_countries', 'wilayah_provinsi.country_code=tb_countries.alpha_2');
		return $q->get();
	}
	public function getProvinceWhere($field = "*", $wheres = null)
	{
		$q = $this->db->select($field)
			->from('wilayah_provinsi')
			->join('tb_countries', 'wilayah_provinsi.country_code=tb_countries.alpha_2');
		if (!empty($wheres)) {
			$q->where($wheres);
		}
		return $q->get();
	}
}
