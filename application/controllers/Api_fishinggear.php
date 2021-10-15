<?php

include_once(dirname(__FILE__) . "/Baseapi.php");

class Api_fishinggear extends Baseapi{

	function getFishingGear(){
		$gear = $this->db->query("SELECT * FROM tb_fishing_gear WHERE state IN ('Y')")->result();
		if(!empty($gear)){
			$this->success("data ada", "data_gear", $gear);
		}else{
			$this->notFound();
		}
	}
}
