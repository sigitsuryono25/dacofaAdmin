<?php

class M_fishing extends CI_Model
{
	public function getAllFishingGear($field = "*")
	{
		$q = $this->db->select($field)
			->from('tb_fishing_gear');
		return $q->get();
	}
	public function getFishingGearWhere($field = "*", $wheres = null)
	{
		$q = $this->db->select($field)
			->from('tb_fishing_gear');
		if (!empty($wheres)) {
			$q->where($wheres);
		}
		return $q->get();
	}
}
