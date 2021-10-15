<?php

include_once(dirname(__FILE__) . "/Baseapi.php");

class Api_negara extends Baseapi{

	public function getListNegara()
	{
		$negara = $this->db->query("SELECT * FROM tb_countries WHERE alpha_2 IN ('ID','MY','TH')")->result();
		if(!empty($negara)){
			$this->success("data ditemukan", "data_negara", $negara);
		}else{
			$this->notFound();
		}
	}

}
