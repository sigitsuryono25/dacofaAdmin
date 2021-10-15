<?php

class M_user extends CI_Model
{
	public function getAllUser($field = "*")
	{
		$q = $this->db->select($field)
			->from('tb_user');
		return $q->get();
	}
	public function getUserWhere($field = "*", $wheres = null)
	{
		$q = $this->db->select($field)
			->from('tb_user');
		if (!empty($wheres)) {
			$q->where($wheres);
		}
		return $q->get();
	}
}
