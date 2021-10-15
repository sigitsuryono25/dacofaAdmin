<?php

include_once(dirname(__FILE__) . "/Baseapi.php");


class Api_ikan extends Baseapi
{
	function getListIkan()
	{
		$daftarIkan = $this->db->query("SELECT * FROM tb_ikan ORDER BY nama_ikan ASC")->result();
		if (!empty($daftarIkan)) {
			$this->success("Data ditemukan", "data_ikan", $daftarIkan);
		} else {
			$this->notFound();
		}
	}

	function cariIkanByNama()
	{
		$namaIkan = $this->input->get('nama');
		$daftarIkan = $this->db->query("SELECT * FROM tb_ikan WHERE nama_ikan LIKE '%$namaIkan%' ORDER BY nama_ikan ASC")->result();
		if (!empty($daftarIkan)) {
			$this->success("Data ditemukan", "data_ikan", $daftarIkan);
		} else {
			$this->notFound();
		}
	}
}
