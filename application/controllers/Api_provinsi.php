<?php
include_once(dirname(__FILE__) . "/Baseapi.php");

class Api_provinsi extends Baseapi
{
	function getAllProvinsi()
	{
		$countryCode = $this->input->get('country_code');
		$daftarProv = $this->db->query("SELECT * FROM wilayah_provinsi WHERE country_code IN ('$countryCode') ORDER BY nama ASC")->result();
		if (!empty($daftarProv)) {
			$this->success("data ditemukan", "data_prov", $daftarProv);
		} else {
			$this->notFound();
		}
	}

	function getProvinsi()
	{
		$daftarProv = $this->db->query("SELECT * FROM wilayah_provinsi")->result();
		if (!empty($daftarProv)) {
			$this->success("data ditemukan", "data_prov", $daftarProv);
		} else {
			$this->notFound();
		}
	}

	function cariProvinsi()
	{
		$namaProv = $this->input->get('nama');
		$daftarProv = $this->db->query("SELECT * FROM wilayah_provinsi WHERE nama LIKE '%$namaProv%'")->result();
		if (!empty($daftarProv)) {
			$this->success("data ditemukan", "data_prov", $daftarProv);
		} else {
			$this->notFound();
		}
	}
}
