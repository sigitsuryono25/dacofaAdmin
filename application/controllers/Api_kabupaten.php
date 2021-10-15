<?php
include_once(dirname(__FILE__) . "/Baseapi.php");

class Api_kabupaten extends Baseapi
{
	public function getKabupaten()
	{
		$idProv = $this->input->get('id_prov');
		$daftarKab = $this->db->query("SELECT * FROM wilayah_kabupaten WHERE provinsi_id IN ('$idProv')")->result();
		if (!empty($daftarKab)) {
			$this->success('data ditemukan', 'data_kab', $daftarKab);
		} else {
			$this->notFound();
		}
	}
}
