<?php

class M_country extends CI_Model
{
	public function getAllCountry($field = "*")
	{
		$q = $this->db->select($field)
			->from('tb_countries');
		return $q->get();
	}
	public function getCountryWhere($field = "*", $wheres = null)
	{
		$q = $this->db->select($field)
			->from('tb_countries');
		if (!empty($wheres)) {
			$q->where($wheres);
		}
		return $q->get();
	}
}
