<?php

class M_fish extends CI_Model
{
	public function getAllFish($field = "*")
	{
		$q = $this->db->select($field)
			->from('tb_ikan');
		return $q->get();
	}
	public function getFishWhere($field = "*", $wheres = null)
	{
		$q = $this->db->select($field)
			->from('tb_ikan');
		if (!empty($wheres)) {
			$q->where($wheres);
		}
		return $q->get();
	}
}
