<?php

class Crud extends CI_Model
{

	function addData($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		return $this->db->affected_rows();
	}

	function updateData($tbl, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($tbl, $data);
		return $this->db->affected_rows();
	}

	function deleteData($tbl, $where)
	{
		$this->db->where($where);
		$this->db->delete($tbl);
		return $this->db->affected_rows();
	}
}
